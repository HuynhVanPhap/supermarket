<?php

namespace App\Services;

use Illuminate\Http\Request;
use Illuminate\Support\Str;

class CategoryService implements ServiceInterface
{
    /**
     * @inheritdoc
     */
    public function processing(Request $request): array
    {
        $params = $request->all('name', 'root_category_id');
        $params['slug'] = Str::slug($request->name).'-'.strtotime(date('d-m-y H:i:s'));

        return $params;
    }
}
