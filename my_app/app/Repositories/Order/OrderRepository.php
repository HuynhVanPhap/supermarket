<?php

namespace App\Repositories\Order;

use App\Jobs\AnalyticRevenue;
use App\Mail\OrderShipped;
use App\Repositories\BaseRepository;
use App\Repositories\Order\OrderRepositoryInterface;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Mail;
use Exception;
use Illuminate\Support\Facades\Auth;
use App\Models\AnalyticRevenue as Revenue;
use App\Traits\Numeric;

class OrderRepository extends BaseRepository implements OrderRepositoryInterface
{
    use Numeric;

    public function getModel()
    {
        return \App\Models\Order::class;
    }

    /**
     * @inheritdoc
     */
    public function filter(array $params, string $email = null)
    {
        $filters = $this->model->select()
        ->when(!empty($params['filterName']), function ($filters) use ($params) {
            return $filters = $filters->where(function ($filters) use ($params) {
                return $filters->orWhere('name', 'like', '%'.$params['filterName'].'%')
                                ->orWhere('code', 'like', '%'.$params['filterName'].'%')
                                ->orWhere('email', 'like', '%'.$params['filterName'].'%')
                                ->orWhere('phone', 'like', '%'.$params['filterName'].'%');
            });
        })
        ->when(isset($params['filterStatusOrder']), function ($filters) use ($params) {
            return $filters = $filters->whereStatus((int) $params['filterStatusOrder']);
        })
        ->when(isset($params['filterCode']), function ($filters) use ($params) {
            return $filters = $filters->where('code', 'like', '%'.$params['filterCode'].'%');
        })
        ->when(!is_null($email), function ($filters) use ($email) {
            return $filters = $filters->whereEmail($email);
        });

        return $filters->orderBy('created_at', 'DESC')->paginate(self::LIMIT);
    }

    public function payment($order, $cart = [])
    {
        if (Auth::check()) {
            $order['user_id'] = Auth::user()->id;
        }

        $order['code'] = Str::random(12);

        DB::beginTransaction();
        try {
            $order = $this->model->create($order);
            $order->detailOrders()->createMany($cart);

            DB::commit();

            Mail::to($order->email)->send(new OrderShipped($order));

            Session::forget('cart');
            Session::forget('customer');

            return true;
        } catch (Exception $e) {
            DB::rollback();
            throw new Exception($e->getMessage());
        }

        return config('constraint.status.fail');
    }

    public function confirm(string $code)
    {
        $order = $this->model->whereCode($code)->first();

        if (blank($order)) {
            Session::flash('error', __('message.not_found'));
        }

        $status = $order->getRawOriginal('status') + 1;
        $order->status = $status;

        if ((int) $status === config('constraint.status.order.received')) {
            $order->date_receive = Carbon::now('Asia/Ho_Chi_Minh')->toDateTimeString();
        }

        if ((int) $status === config('constraint.status.order.paymented')) {
            $order->date_payment = Carbon::now('Asia/Ho_Chi_Minh')->toDateTimeString();
            // AnalyticRevenue::dispatch($order);

            $revenue = $this->covertToBackEndFormat(
                array_reduce(array_column($order->detailOrders->toArray(), 'payment'), function ($carry, $item) {
                    return $carry += $this->covertToBackEndFormat($item);
                }, 0)
            );

            Revenue::create([
                'order_id' => $order->id,
                'date' => Carbon::now('Asia/Ho_Chi_Minh')->day,
                'month' => Carbon::now('Asia/Ho_Chi_Minh')->month,
                'year' => Carbon::now('Asia/Ho_Chi_Minh')->year,
                'revenue' => $revenue
            ]);
        }

        $order->save();

        return true;
    }

    public function analyticsStatusOrders()
    {
        return $this->model->select('status', DB::raw('count(*) as total'))
                           ->whereDate('created_at', '>=', Carbon::now('Asia/Ho_Chi_Minh')->subdays(7)->toDateString())
                           ->groupBy('status')
                           ->pluck('total','status')
                           ->all();
    }
}
