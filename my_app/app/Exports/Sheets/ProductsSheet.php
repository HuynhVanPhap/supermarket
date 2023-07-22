<?php

namespace App\Exports\Sheets;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Contracts\View\View;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Arr;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\FromArray;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\WithColumnWidths;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithTitle;
use Maatwebsite\Excel\Events\AfterSheet;
use Maatwebsite\Excel\Excel;
use PhpOffice\PhpSpreadsheet\Cell\Coordinate;
use PhpOffice\PhpSpreadsheet\Cell\DataValidation;

class ProductsSheet implements FromArray, WithHeadings, WithColumnWidths, WithTitle
{
    protected $products;

    public function __construct(array $products)
    {
        $this->products = $products;
    }

    public function array(): array
    {
        return $this->products;
    }

    public function headings(): array
    {
        $columns = [
            __("Product's name"),
            __('Stock'),
            __('Price'),
            __('Discount percent'),
            __('Code field', ['field' => __('Category')]),
            __("Description", ['name' => __('Product')])
        ];
        return $columns;
    }

    public function columnWidths(): array
    {
        return [
            'A' => 50,
            'B' => 50,
            'C' => 50,
            'D' => 50,
            'E' => 50,
            'F' => 50
        ];
    }

    /**
     * @return string
     */
    public function title(): string
    {
        return __("Products");
    }

    /**
     * Register Event working on Worksheet
     *
     * @return response()
     */
    public function registerEvents(): array
    {
        $categories = Arr::pluck(Category::all(), 'name', 'id');

        return [
            // Set option for Category column
            AfterSheet::class => function(AfterSheet $event) use ($categories) {
                $row_count = 10;
                $column_count = 5;
                $drop_column = 'E';
                $options = $categories;

                // set dropdown list for first data row
                // Muốn làm việc với Dropdown list thì phải làm việc với Data Validation
                $validation = $event->sheet->getCell("{$drop_column}2")->getDataValidation();
                $validation->setType(DataValidation::TYPE_LIST );
                $validation->setErrorStyle(DataValidation::STYLE_INFORMATION );
                $validation->setAllowBlank(false);
                $validation->setShowInputMessage(true);
                $validation->setShowErrorMessage(true);
                $validation->setShowDropDown(true);
                $validation->setErrorTitle('Input error');
                $validation->setError('Value is not in list.');
                $validation->setPromptTitle('Pick from list');
                $validation->setPrompt('Please pick a value from the drop-down list.');
                $validation->setFormula1(sprintf('"%s"',implode(',',$options)));

                // clone validation to remaining rows
                for ($i = 3; $i <= $row_count; $i++) {
                    $event->sheet->getCell("{$drop_column}{$i}")->setDataValidation(clone $validation);
                }

                // set columns to autosize
                for ($i = 1; $i <= $column_count; $i++) {
                    $column = Coordinate::stringFromColumnIndex($i);
                    $event->sheet->getColumnDimension($column)->setAutoSize(true);
                }

                // $event->sheet->getDelegate()->getColumnDimension('F')->setWidth(350);
            },
        ];
    }
}
