<?php

namespace App\Imports;

use App\Imports\Sheets\ProductsSheetImport;
use App\Models\Product;
use App\Traits\Numeric;
use Illuminate\Support\Collection;
use Illuminate\Support\Str;
use Maatwebsite\Excel\Concerns\Importable;
use Maatwebsite\Excel\Concerns\WithMultipleSheets;

class ProductImport implements WithMultipleSheets
{
    use Importable;

    public function sheets(): array
    {
        return [
            __("Products") => new ProductsSheetImport(),
        ];
    }


}
