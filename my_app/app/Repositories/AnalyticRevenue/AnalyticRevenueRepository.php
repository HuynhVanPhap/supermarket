<?php

namespace App\Repositories\AnalyticRevenue;

use App\Repositories\BaseRepository;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class AnalyticRevenueRepository extends BaseRepository implements AnalyticRevenueRepositoryInterface
{
    public function getModel()
    {
        return \App\Models\AnalyticRevenue::class;
    }

    /**
     * @inheritdoc
     */
    public function analyticEachMonth()
    {
        return $this->model->select('month', DB::raw('sum(revenue) as revenue'))
                           ->where('year', Carbon::now('Asia/Ho_Chi_Minh')->year)
                           ->groupBy('month')
                           ->pluck('revenue', 'month')
                           ->all();
    }
}
