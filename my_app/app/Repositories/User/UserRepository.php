<?php

namespace App\Repositories\User;

use App\Repositories\BaseRepository;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\Hash;

class UserRepository extends BaseRepository implements UserRepositoryInterface
{
    public function getModel()
    {
        return \App\Models\User::class;
    }

    /**
     * @inheritdoc
     */
    public function filter(array $params) {
        $filters = $this->model->select()
            ->when(!empty($params['filterName']), function ($filters) use ($params) {
                return $filters = $filters->where(function ($filters) use ($params) {
                    return $filters->orWhere('name', 'like', '%'.$params['filterName'].'%')
                                    ->orWhere('address', 'like', '%'.$params['filterName'].'%')
                                    ->orWhere('email', 'like', '%'.$params['filterName'].'%')
                                    ->orWhere('phone', 'like', '%'.$params['filterName'].'%');
                });
            })
            ->when(!empty($params['filterRole']), function ($filters) use ($params) {
                return $filters->whereHas('role', function (Builder $query) use ($params) {
                    $query->whereValue($params['filterRole']);
                });
            });

    return $filters->orderBy('created_at', 'DESC')->paginate(self::LIMIT);
    }

    /**
     * @inheritdoc
     */
    public function getByEmail(string $email) {
        return $this->model->whereEmail($email)->with('orders')->first();
    }

    /**
     * @inheritdoc
     */
    public function changePassword(string $email, string $password) {
        return $this->model->whereEmail($email)->update(['password' => Hash::make($password)]);
    }
}
