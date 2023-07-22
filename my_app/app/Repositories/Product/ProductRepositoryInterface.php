<?php

namespace App\Repositories\Product;

use App\Models\Product;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Pagination\LengthAwarePaginator;

interface ProductRepositoryInterface
{
    public function filter(array $params);

    /**
     * Get list product is New offers
     *
     * @return Collection<Product>
    */
    public function getNewOffers(): Collection;

    /**
     * Get list product is Advertised offers
     *
     * @return Collection<Product>
    */
    public function getAdvertisedOffers(): Collection;

    /**
     * Get list product is Today offers
     *
     * @return Collection<Product>
    */
    public function getTodayOffers(): Collection;

    /**
     * Get All products belong to root category by slug
     *
     * @param string $slug
     *
     * @return Illuminate\Pagination\LengthAwarePaginator<Product>
     */
    public function getProductsBySlugRootCategory(string $slug): LengthAwarePaginator;

    /**
     * Get All products belong to category by slug
     *
     * @param string $slug
     *
     * @return Illuminate\Pagination\LengthAwarePaginator<Product>
     */
    public function getProductsBySlugCategory(string $slug): LengthAwarePaginator;
}
