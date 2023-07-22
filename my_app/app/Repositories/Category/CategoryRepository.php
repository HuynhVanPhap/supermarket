<?php

namespace App\Repositories\Category;

use App\Models\Category;
use App\Repositories\BaseRepository;
use Exception;
use Illuminate\Support\Facades\DB;

class CategoryRepository extends BaseRepository implements CategoryRepositoryInterface
{
    public function getModel()
    {
        return \App\Models\Category::class;
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
            ->when(!empty($params['filterRootCategoryId']), function ($filters) use ($params) {
                return $filters->whereRootCategoryId($params['filterRootCategoryId']);
            })
            ->when(isset($params['filterDisplay']), function ($filters) use ($params) {
                return $filters->whereDisplayStatus((int) $params['filterDisplay']);
            });

        return $filters->orderBy('created_at', 'DESC')->paginate(self::LIMIT);
    }

    public function delete(int $id): bool
    {
        DB::beginTransaction();
        try {
            // Thử viết theo câu lệnh MySQL thuần
            parent::getById($id)->products->map(function ($product) {
                $product->delete();
            });

            parent::delete($id);

            DB::commit();

            return config('constraint.status.success');
        } catch (Exception $e) {
            DB::rollBack();

            throw new Exception($e->getMessage());
        }

        return config('constraint.status.fail');
    }

    public function changeDisplayStatus(int $id, int $displayStatus)
    {
        $category = $this->getById($id);

        if ($category->rootCategory->display_status) {
            DB::beginTransaction();
            try {
                // Thử viết theo câu lệnh MySQL thuần
                $category->products->map(function ($product) use ($displayStatus) {
                    $product->update(['display_status' => $displayStatus]);
                });

                parent::changeDisplayStatus($id, $displayStatus);

                DB::commit();

                return config('constraint.status.success');
            } catch (Exception $e) {
                DB::rollBack();

                throw new Exception($e->getMessage());
            }
        }

        return config('constraint.status.fail');
    }

    public function restore(int $id)
    {
        $category = parent::getByIdOnlyTrashed($id);

        if (!blank($category->rootCategory()->first())) {
            DB::beginTransaction();
            try {
                $category->products()->restore();

                $category->restore();

                DB::commit();

                return config('constraint.status.success');
            } catch (Exception $e) {
                DB::rollBack();

                throw new Exception($e->getMessage());
            }
        }

        return config('constraint.status.fail');
    }

    public function clear(int $id)
    {
        DB::beginTransaction();
        try {
            parent::getByIdOnlyTrashed($id)->products()->forceDelete();

            parent::getByIdOnlyTrashed($id)->forceDelete();

            DB::commit();

            return config('constraint.status.success');
        } catch (Exception $e) {
            DB::rollBack();

            throw new Exception($e->getMessage());
        }

        return config('constraint.status.fail');
    }

    public function getTrashed(int $limit = self::LIMIT)
    {
        return $this->model->onlyTrashed()->orderBy('deleted_at','DESC')->with(['rootCategory' => function ($query) {
            $query->withTrashed();
        }])->paginate($limit);
    }
}
