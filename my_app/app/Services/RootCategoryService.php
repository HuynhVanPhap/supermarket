<?php

namespace App\Services;

use Illuminate\Http\Request;
use Illuminate\Support\Str;

class RootCategoryService implements ServiceInterface
{
    /**
     * @inheritdoc
     */
    public function processing(Request $request): array
    {
        $params = $request->all('name');
        $params['slug'] = Str::slug($request->name).'-'.strtotime(date('d-m-y H:i:s'));

        return $params;
    }
}
