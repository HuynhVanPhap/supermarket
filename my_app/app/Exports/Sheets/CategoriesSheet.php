<?php

namespace App\Exports\Sheets;

use App\Models\Category;
use Illuminate\Support\Arr;
use Maatwebsite\Excel\Concerns\FromArray;
use Maatwebsite\Excel\Concerns\WithColumnWidths;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithTitle;

class CategoriesSheet implements FromArray, WithHeadings, WithColumnWidths, WithTitle
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function array(): array
    {
        return Category::select('id', 'name')->get()->toArray();
    }

    public function headings(): array
    {
        $columns = [
            __('Code field', ['field' => __('Category')]),
            __("Category's name"),
        ];
        return $columns;
    }

    public function columnWidths(): array
    {
        return [
            'A' => 50,
            'B' => 50,
        ];
    }

    /**
     * @return string
     */
    public function title(): string
    {
        return __('Categories');
    }
}
