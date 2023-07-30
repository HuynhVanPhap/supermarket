<?php

namespace App\Repositories;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Pagination\LengthAwarePaginator;

interface BaseRepositoryInterface
{
    /**
     * Set a Model
     */
    public function setModel();

    /**
     * Get a model
     */
    public function getModel();

    /**
     * Get list model's data
     *
     * @return Illuminate\Database\Eloquent\Collection
     */
    public function getList(array|string $column): Collection;

    /**
     * Create new model
     *
     * @return Illuminate\Database\Eloquent\Model
     */
    public function create(array $params): Model;

    /**
     * Update exist model
     *
     * @return boolean
     */
    public function update(int $id, array $params): bool;

    /**
     * Delete exist model
     *
     * @return boolean
     */
    public function delete(int $id): bool;

    /**
     * Get a exist model by id
     *
     * @return Illuminate\Database\Eloquent\Model;
     */
    public function getById(int $id): Model;

    /**
     * Get a exist model by slug
     *
     * @param string $slug
     *
     * @return Illuminate\Database\Eloquent\Model;
     */
    public function getBySlug(string $slug): Model;

    /**
     * Get list model's data order by column
     *
     * @return
     */
    public function getListByOrder(string $order, string $byColumn, int $limit, array|string $column);

    /**
     * Get list model's data use paginates
     *
     * @return Illuminate\Pagination\LengthAwarePaginator
     */
    public function getListPaginates(int $limit, array|string $column): LengthAwarePaginator;

    /**
     * Change display status
     *
     * @param int $id
     * @param int $displayStatus
     *
     * @return void
     */
    public function changeDisplayStatus(int $id, int $displayStatus);

    /**
     * Delete soft
     */
    public function getTrashed();

    public function restore(int $id);

    /**
     * Clear data soft delete
     *
     * @param int $id
     */
    public function clear(int $id);

    /**
     * Count today's new data
     *
     * @return int
     */
    public function countNewToday(): int;

    /**
     * Create new instance and return it's id
     *
     * @param array $modelParams
     * @return int
     */
    public function createAndGetId(array $modelParams): int;
}
