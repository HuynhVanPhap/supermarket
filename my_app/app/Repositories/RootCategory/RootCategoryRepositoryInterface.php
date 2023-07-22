<?php

namespace App\Repositories\RootCategory;

use App\Models\RootCategory;
use Illuminate\Database\Eloquent\Collection;

interface RootCategoryRepositoryInterface
{
    public function filter(array $params);

    public function delete(int $id): bool;

    public function changeDisplayStatus(int $id, int $displayStatus);

    public function restore(int $id);

    public function clear(int $id);

    /**
     * Create Navigation for store
     *
     * @return Collection<RootCategory>
     */
    public function getNavigation(): Collection;

    /**
     * Get all Root Category with Categories
     *
     * @return Collection<RootCategory>
     */
    public function getMenu(): Collection;
}
