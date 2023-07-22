<?php

namespace App\Exports;

use App\Exports\Sheets\CategoriesSheet;
use App\Exports\Sheets\ProductsSheet;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\WithMultipleSheets;

class ProductsExport implements WithMultipleSheets
{
    use Exportable;

    protected $products;

    public function __construct(array $products)
    {
        $this->products = $products;
    }

    /**
     * @return array
     */
    public function sheets(): array
    {
        $sheets = [
            new ProductsSheet($this->products),
            new CategoriesSheet()
        ];

        return $sheets;
    }
}
