<?php

namespace App\Imports\Sheets;

use App\Models\Product;
use App\Traits\Numeric;
use Illuminate\Support\Collection;
use Illuminate\Support\Str;
use Maatwebsite\Excel\Concerns\Importable;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithValidation;
use App\Rules\Money;

class ProductsSheetImport implements ToCollection, WithHeadingRow, WithValidation
{
    use Numeric;

    public function collection(Collection $rows)
    {
        foreach ($rows as $row)
        {
            Product::create([
                'name' => $row['name'],
                'image' => 'default-product.png',
                'slug' => Str::slug($row['name']).'-'.strtotime(date('d-m-y H:i:s')),
                'display_status' => config('constraint.display.disactive'),
                'category_id' => $row['category_id'],
                'price' => $this->covertToBackEndFormat($row['price']),
                'discount_percent' => $row['discount_percent'],
                'stock' => $row['stock'],
                'description' => $row['description']
            ]);
        }
    }

    public function rules(): array
    {
        $rules = [
            'name' => ['bail', 'required', 'min:5', 'max:100'],
            'category_id' => ['bail', 'required', 'numeric', 'exists:categories,id,deleted_at,NULL'],
            'price' => ['bail', 'required', new Money()],
            'discount_percent' => ['bail', 'numeric', 'min:0', 'max:100'],
            'stock' => ['bail', 'required', 'numeric', 'min:1'],
        ];

        return $rules;
    }

    /**
     * @return array
     */
    public function customValidationMessages(): array
    {
        $messages = [
            'name.required' => __("The field is required", ['field' => __("Product's name")]),
            'name.min' => __("The field must be at least characters", ['field' => __("Product's name"), 'number' => 5]),
            'name.max' => __("The field must be at greater characters", ['field' => __("Product's name"), 'number' => 100]),
            'category_id.required' => __("The field is required", ['field' => __("Product")]),
            'category_id.numeric' => __("Data is invalid"),
            'category_id.exists' => __("Data does not exist"),
            'price.required' => __("The field is required", ['field' => __("Price")]),
            'discount_percent.numeric' => __("Data is invalid"),
            'discount_percent.min' => __("The field must be at least characters", ['field' => __("Product's name"), 'number' => 0]),
            'discount_percent.max' => __("The field must be at greater characters", ['field' => __("Product's name"), 'number' => 100]),
            'stock.required' => __("The field is required", ['field' => __("Stock")]),
            'stock.numeric' => __("Data is invalid"),
            'stock.min' => __("The field must be at least characters", ['field' => __("Stock"), 'number' => 1]),
        ];

        return $messages;
    }
}
