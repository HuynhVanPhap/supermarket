<?php

namespace App\Services;

use App\Models\Category;
use App\Models\RootCategory;
use Illuminate\Database\Eloquent\Collection;
use App\Repositories\Product\ProductRepositoryInterface;
use Illuminate\Pagination\LengthAwarePaginator;

class PageService
{
    protected $productRepo;

    public function __construct()
    {
        $this->productRepo = app(ProductRepositoryInterface::class);
    }

    /**
     * @param Collection<RootCategory> $menu
     * @param string $slug
     *
     * @return LengthAwarePaginator<Product>
     */
    public function getProducts(Collection $menu, string $slug)
    {
        if (!blank($menu->where('slug', $slug))) {
            return [
                'name' => $menu->where('slug', $slug)->first()->name,
                'products' => $this->productRepo->getProductsBySlugRootCategory($slug)
            ];
        } else {
            $category = $menu->first(function ($value, $key) use ($slug) {
                return !blank($value->categories->where('slug', $slug));
            });

            if (!blank($category)) {
                return [
                    'name' => $category->categories->where('slug', $slug)->first()->name,
                    'products' => $this->productRepo->getProductsBySlugCategory($slug)
                ];
            }
        }

        return [
            'name' => '404',
            'products' => []
        ];
    }
}
