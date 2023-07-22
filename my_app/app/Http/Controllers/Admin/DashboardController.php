<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Repositories\AnalyticRevenue\AnalyticRevenueRepositoryInterface;
use App\Repositories\Order\OrderRepositoryInterface;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    protected $revenueRepo;
    protected $orderRepo;

    public function __construct()
    {
        $this->revenueRepo = app(AnalyticRevenueRepositoryInterface::class);
        $this->orderRepo = app(OrderRepositoryInterface::class);
    }

    public function page()
    {
        $orderStatus = function () {
            $data = $this->orderRepo->analyticsStatusOrders();

            for ($i = 0; $i < count(config('constraint.status.order')); $i++) {
                if(!isset($data[$i])) {
                    $data[$i] = 0;
                }
            }

            ksort($data);

            return $data;
        };

        $revenue = function () {
            $months = 12;
            $data = $this->revenueRepo->analyticEachMonth();

            for ($i = 1; $i <= $months; $i++) {
                if (!isset($data[$i])) {
                    $data[$i] = 0;
                }
            }

            ksort($data);

            return $data;
        };

        return view('admin.pages.dashboard')->with([
            'revenue' => json_encode($revenue()),
            'orderStatus' => json_encode($orderStatus()),
            'ordersToday' => $this->orderRepo->countNewToday(),
            // 'numMembers' => $this->userRepo->countNewToday(),
        ]);
    }
}
