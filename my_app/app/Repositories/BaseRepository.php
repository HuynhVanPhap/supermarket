<?php

namespace App\Repositories;

use App\Repositories\BaseRepositoryInterface;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Pagination\LengthAwarePaginator;

abstract class BaseRepository implements BaseRepositoryInterface
{
    /**
     * @var Illuminate\Database\Eloquent\Model $model
     */
    protected $model;

    const LIMIT = 10;

    public function __construct()
    {
        $this->setModel();
    }

    public function setModel()
    {
        $this->model = app()->make($this->getModel());
    }

    /**
     * @inheritdoc
     */
    public function getList(array|string $column = '*'): Collection
    {
        return $this->model->select($column)->get();
    }

    /**
     * @inheritdoc
     */
    public function create(array $params): Model
    {
        return $this->model->create($params);
    }

    /**
     * @inheritdoc
     */
    public function createAndGetId(array $modelParams): int
    {
        return $this->model->insertGetId($modelParams);
    }

    /**
     * @inheritdoc
     */
    public function update(int $id, array $params): bool
    {
        return $this->model->whereId($id)->update($params);
    }

    /**
     * @inheritdoc
     */
    public function delete(int $id): bool
    {
        return $this->model->destroy($id);
    }

    /**
     * @inheritdoc
     */
    public function getById(int $id): Model
    {
        return $this->model->whereId($id)->first();
    }

    /**
     * @inheritdoc
     */
    public function getBySlug(string $slug): Model
    {
        return $this->model->whereSlug($slug)->first();
    }

    /**
     * @inheritdoc
     */
    public function getListByOrder(string $order = 'DESC', string $byColumn = 'id',int $limit = self::LIMIT, array|string $column = '*')
    {
        return $this->model
            ->select($column)
            ->orderBy($byColumn, $order)
            ->limit($limit)
            ->get();
    }

    /**
     * @inheritdoc
     */
    public function getListPaginates(int $limit = self::LIMIT, array|string $column = '*'): LengthAwarePaginator
    {
        return $this->model
            ->select($column)
            ->orderBy('id','DESC')
            ->paginate($limit);
    }

    /**
     * @inheritdoc
     */
    public function changeDisplayStatus(int $id, int $displayStatus)
    {
        return $this->model
            ->whereId($id)
            ->update(['display_status' => $displayStatus]);
    }

    /**
     * @inheritdoc
     */
    public function getTrashed(int $limit = self::LIMIT)
    {
        return $this->model->onlyTrashed()->orderBy('deleted_at','DESC')->paginate($limit);
    }

    public function restore(int $id)
    {
        return $this->model->withTrashed()->whereId($id)->restore();
    }

    public function clear(int $id)
    {
        $this->model->withTrashed()->whereId($id)->forceDelete();
    }

    public function getByIdOnlyTrashed(int $id)
    {
        return $this->model->withTrashed()->whereId($id)->first();
    }

    /**
     * @inheritdoc
     */
    public function countNewToday(): int
    {
        return $this->model->whereDate('created_at', Carbon::now('Asia/Ho_Chi_Minh')->toDateString())->count();
    }
}
