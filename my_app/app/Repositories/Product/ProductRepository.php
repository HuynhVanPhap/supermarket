<?php

namespace App\Repositories\Product;

use App\Repositories\BaseRepository;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Pagination\LengthAwarePaginator;

class ProductRepository extends BaseRepository implements ProductRepositoryInterface
{
    public function getModel()
    {
        return \App\Models\Product::class;
    }

    /**
     * @inheritdoc
     */
    public function filter(array $params)
    {
        $filters = $this->model->select()
            ->when(!empty($params['filterName']), function ($filters) use ($params) {
                return $filters->where('name', 'like', '%'.$params['filterName'].'%');
            })
            ->when(!empty($params['filterCategoryId']), function ($filters) use ($params) {
                return $filters->whereCategoryId($params['filterCategoryId']);
            })
            ->when(isset($params['filterDisplay']), function ($filters) use ($params) {
                return $filters->whereDisplayStatus((int) $params['filterDisplay']);
            });

        return $filters->orderBy('created_at', 'DESC')->paginate(self::LIMIT);
    }

    public function changeDisplayStatus(int $id, int $displayStatus)
    {
        if ($this->getById($id)->category->display_status) {
            parent::changeDisplayStatus($id, $displayStatus);

            return config('constraint.status.success');
        }

        return config('constraint.status.fail');
    }

    public function getTrashed(int $limit = self::LIMIT)
    {
        return $this->model->onlyTrashed()->orderBy('deleted_at','DESC')->with(['category' => function ($query) {
            $query->withTrashed();
        }])->paginate($limit);
    }

    public function restore(int $id)
    {
        if (parent::getByIdOnlyTrashed($id)->category()->first()) {
            parent::restore($id);
        }

        return config('constraint.status.fail');
    }

    /**
     * @inheritdoc
     */
    public function getNewOffers(): Collection
    {
        return $this->model->select(['id', 'name', 'slug', 'image', 'price', 'discount_percent'])
                        ->orderBy('created_at', 'DESC')
                        ->whereDisplayStatus(config('constraint.display.active'))
                        ->where('discount_percent', '>', 0)
                        ->limit(config('constraint.limit.new_offers'))
                        ->get();
    }

    /**
     * @inheritdoc
     */
    public function getAdvertisedOffers(): Collection
    {
        return $this->model->select(['id', 'name', 'slug', 'image', 'price', 'discount_percent'])
                        ->orderBy('created_at', 'DESC')
                        ->whereDisplayStatus(config('constraint.display.active'))
                        ->where('discount_percent', '>', 0)
                        ->limit(config('constraint.limit.advertised_offers'))
                        ->get();
    }

    /**
     * @inheritdoc
     */
    public function getTodayOffers(): Collection
    {
        return $this->model->select(['id', 'name', 'slug', 'image', 'price', 'discount_percent'])
                        ->orderBy('created_at', 'DESC')
                        ->whereDisplayStatus(config('constraint.display.active'))
                        ->where('discount_percent', '>', 0)
                        ->limit(config('constraint.limit.today_offers'))
                        ->get();
    }

    /**
     * @inheritdoc
     */
    public function getProductsBySlugRootCategory(string $slug): LengthAwarePaginator
    {
        return $this->model->select(['id', 'name', 'slug', 'image', 'price', 'discount_percent'])
                        ->orderBy('id', 'DESC')
                        ->whereDisplayStatus(config('constraint.display.active'))
                        ->whereHas('category.rootCategory', function (Builder $query) use ($slug) {
                            $query->whereSlug($slug);
                        })
                        ->paginate(9);
    }

    /**
     * @inheritdoc
     */
    public function getProductsBySlugCategory(string $slug): LengthAwarePaginator
    {
        return $this->model->select(['id', 'name', 'slug', 'image', 'price', 'discount_percent'])
                        ->orderBy('id', 'DESC')
                        ->whereDisplayStatus(config('constraint.display.active'))
                        ->whereHas('category', function (Builder $query) use ($slug) {
                            $query->whereSlug($slug);
                        })
                        ->paginate(9);
    }

    public function search(string $keyword)
    {
        return $this->model->select()->where('name', 'like', '%'.$keyword.'%')->paginate(9);
    }
}
