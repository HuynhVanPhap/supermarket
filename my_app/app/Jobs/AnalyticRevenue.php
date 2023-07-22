<?php

namespace App\Jobs;

use App\Models\Order;
use App\Traits\Numeric;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use App\Models\AnalyticRevenue as Revenue;
use Carbon\Carbon;

class AnalyticRevenue implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels, Numeric;

    protected $order;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct(Order $order)
    {
        $this->order = $order;
        // $this->delay(now()->addMinutes(1));
        // $this->onQueue('revenue');
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $revenue = $this->covertToBackEndFormat(
            array_reduce(array_column($this->order->detailOrders->toArray(), 'payment'), function ($carry, $item) {
                return $carry += $this->covertToBackEndFormat($item);
            }, 0)
        );

        Revenue::create([
            'order_id' => $this->order->id,
            'date' => Carbon::now('Asia/Ho_Chi_Minh')->day,
            'month' => Carbon::now('Asia/Ho_Chi_Minh')->month,
            'year' => Carbon::now('Asia/Ho_Chi_Minh')->year,
            'revenue' => $revenue
        ]);
    }
}
