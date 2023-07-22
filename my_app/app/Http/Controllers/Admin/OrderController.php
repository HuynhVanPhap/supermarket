<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Repositories\Order\OrderRepositoryInterface;
use App\Traits\Numeric;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class OrderController extends Controller
{
    use Numeric;

    protected $repo;

    public function __construct()
    {
        $this->repo = app(OrderRepositoryInterface::class);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $orders = $this->repo->filter($request->all(['filterName', 'filterStatusOrder']));

        $request->flashOnly(['filterName', 'filterStatusOrder']);

        return view('admin.pages.orders.index')->with([
            'orders' => $orders
        ]);
    }

    public function list(Request $request, string $email)
    {
        if (Gate::allows('private', $email)) {
            $orders = $this->repo->filter($request->all(['filterCode', 'filterStatusOrder']), $email);

            $request->flashOnly(['filterCode', 'filterStatusOrder']);

            return view('admin.pages.orders.list')->with([
                'orders' => $orders
            ]);
        }

        abort(404);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function show(Order $order)
    {
        if (Gate::allows('private', $order->user->email)) {
            $total = $this->covertToMoney(
                array_reduce(array_column($order->detailOrders->toArray(), 'payment'), function ($carry, $item) {
                    return $carry += $this->covertToBackEndFormat($item);
                }, 0)
            );

            return view('admin.pages.orders.show')->with([
                'order' => $order,
                'total' => $total
            ]);
        }

        abort(404);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function edit(Order $order)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\Request  $request
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Order $order)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function destroy(Order $order)
    {
        //
    }

    public function confirm(string $code)
    {
        // return response()->json(array('success' => true, 'html' => view('admin.fragments.info_user')->with([
        //         'order' => $this->repo->forward($code),
        //     ])->render()
        // ));


        return $this->repo->confirm($code);
    }
}
