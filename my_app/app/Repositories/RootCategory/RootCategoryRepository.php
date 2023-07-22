<?php

namespace App\Repositories\RootCategory;

use App\Repositories\BaseRepository;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\DB;
use Exception;

class RootCategoryRepository extends BaseRepository implements RootCategoryRepositoryInterface
{
    public function getModel()
    {
        return \App\Models\RootCategory::class;
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
            ->when(isset($params['filterDisplay']), function ($filters) use ($params) {
                return $filters->whereDisplayStatus((int) $params['filterDisplay']);
            });

        return $filters->orderBy('created_at', 'DESC')->paginate(self::LIMIT);
    }

    /**
     * Move Root category and data references to trash
     *
     * @param int $id
     *
     * @return bool
     */
    public function delete(int $id): bool
    {
        DB::beginTransaction();
        try {
            // Thử viết theo câu lệnh MySQL thuần
            parent::getById($id)->categories->map(function ($category) {
                $category->products->map(function ($product) {
                    $product->delete();
                });
                $category->delete();
            });

            parent::delete($id);

            DB::commit();

            return 1;
        } catch (Exception $e) {
            DB::rollBack();

            throw new Exception($e->getMessage());
        }

        return 0;
    }

    /**
     * Change Root category's display status and data references to trash
     *
     * @param int $id
     * @param int $displayStatus
     *
     * @return bool
     */
    public function changeDisplayStatus(int $id, int $displayStatus)
    {
        DB::beginTransaction();
        try {
            // Thử viết theo câu lệnh MySQL thuần
            $this->model->find($id)->categories->map(function ($category) use ($displayStatus) {
                $category->products->map(function ($product) use ($displayStatus) {
                    $product->update(['display_status' => $displayStatus]);
                });

                $category->update(['display_status' => $displayStatus]);
            });

            parent::changeDisplayStatus($id, $displayStatus);

            DB::commit();

            return config('constraint.status.success');
        } catch (Exception $e) {
            DB::rollBack();

            throw new Exception($e->getMessage());
        }

        return config('constraint.status.fail');
    }

    public function restore(int $id)
    {
        DB::beginTransaction();
        try {
            parent::getByIdOnlyTrashed($id)->categories()->withTrashed()->get()->map(function ($category) {
                $category->products()->withTrashed()->get()->map(function ($product) {
                    $product->restore();
                });
                $category->restore();
            });

            parent::getByIdOnlyTrashed($id)->restore();

            DB::commit();

            return 1;
        } catch (Exception $e) {
            DB::rollBack();

            throw new Exception($e->getMessage());
        }

        return 0;
    }

    public function clear(int $id)
    {
        DB::beginTransaction();
        try {
            parent::getByIdOnlyTrashed($id)->categories()->withTrashed()->get()->map(function ($category) {
                $category->products()->withTrashed()->get()->map(function ($product) {
                    $product->forceDelete();
                });
                $category->forceDelete();
            });

            parent::getByIdOnlyTrashed($id)->forceDelete();

            DB::commit();

            return 1;
        } catch (Exception $e) {
            DB::rollBack();

            throw new Exception($e->getMessage());
        }

        return 0;
    }

    /**
     * @inheritdoc
     */
    public function getNavigation(): Collection
    {
        return $this->model
            ->select(['id', 'name', 'slug'])
            ->whereDisplayStatus(config('constraint.display.active'))
            ->limit(config('constraint.limit.navigation'))
            ->orderBy('created_at', 'DESC')
            ->with(['categories' => function ($query) {
                $query->select(['id', 'name', 'slug', 'root_category_id']) // Always need foreign key/primary key, involved in the relation, to be selected
                    ->whereDisplayStatus(config('constraint.display.active'));
            }])
            ->get();
    }

    /**
     * @inheritdoc
     */
    public function getMenu(): Collection
    {
        return $this->model
            ->select(['id', 'name', 'slug'])
            ->whereDisplayStatus(config('constraint.display.active'))
            ->with(['categories' => function ($query) {
                $query->select(['id', 'name', 'slug', 'root_category_id'])
                    ->whereDisplayStatus(config('constraint.display.active'));
            }])
            ->get();
    }
}
