<?php

namespace App\Services;

use App\Repositories\Order\OrderRepositoryInterface;
use App\Traits\CartTrait;
use Illuminate\Support\Facades\Session;

class ShoppingService
{
    use CartTrait;

    protected $orderRepo;

    public function __construct()
    {
        $this->orderRepo = app(OrderRepositoryInterface::class);
    }

    public function cart(array $params)
    {
        if (is_null($this->get($params['slug']))) {
            return $this->add($params);
        }

        return $this->increment($params['slug']);
    }

    public function updateCart(array $params)
    {
        foreach($params as $slug => $add) {
            $this->update($slug.'.0.add', $add);

            $updatePayment = $this->getPaymentUnit($slug)*$this->get($slug.'.0.add');

            $this->update($slug.'.0.payment', $this->covertToMoney($updatePayment));
        }

        return true;
    }

    public function removeCart(string $key)
    {
        return $this->remove($key);
    }

    public function customerInfo(array $params)
    {
        if (Session::has('customer')) {
            foreach (current(Session::get('customer')) as $key => $value) {
                Session::put('customer.0.'.$key, $params[$key]);
            }
        } else {
            Session::push('customer', $params);
        }

        return true;
    }

    public function payment()
    {
        $cart = [];

        foreach (Session::get('cart') as $key => $value) {
            array_push($cart, [
                'product_id' => $value[0]['id'],
                'payment' => $this->covertToBackEndFormat($value[0]['payment']),
                'quantity' => $value[0]['add']
            ]);
        }

        return $this->orderRepo->payment(current(Session::get('customer')), $cart);
    }
}
