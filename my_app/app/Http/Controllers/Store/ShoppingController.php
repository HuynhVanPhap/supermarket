<?php

namespace App\Http\Controllers\Store;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\CustomerRequest;
use App\Services\ShoppingService;
use Illuminate\Support\Facades\Session;

class ShoppingController extends Controller
{
    protected $service;

    public function __construct(ShoppingService $shoppingService)
    {
        $this->service = $shoppingService;
    }

    public function cart(Request $request)
    {
        $this->service->cart($request->all());

        return true;
    }

    public function updateCart(Request $request)
    {
        $this->service->updateCart($request->all());

        return true;
    }

    public function removeCart(Request $request)
    {
        $this->service->removeCart($request->slug);

        return true;
    }

    public function customerInfo(CustomerRequest $request)
    {
        $this->service->customerInfo($request->all([
            'name', 'phone', 'email', 'address'
        ]));

        return redirect()->route('payment.page');
    }

    public function payment(Request $request)
    {
        if ($request->confirm != 'confirm') {
            return back();
        }

        if ($this->service->payment() === config('constraint.status.fail')) {
            return back();
        }

        Session::flash('hadPayment', true);

        return redirect()->route('payment.success.page');
    }
}
