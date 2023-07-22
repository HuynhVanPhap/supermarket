<?php

namespace App\Repositories\DetailOrder;

use App\Repositories\BaseRepository;

class DetailOrderRepository extends BaseRepository implements DetailOrderRepositoryInterface
{
    public function getModel()
    {
        return \App\Models\DetailOrder::class;
    }
}
