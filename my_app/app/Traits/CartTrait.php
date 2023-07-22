<?php

namespace App\Traits;

use Illuminate\Support\Facades\Session;
use Illuminate\Support\Collection;

trait CartTrait
{
    use Numeric;

    public function add(array $params)
    {
        $params = array_filter($params);

        $params['payment'] = isset($params['price_discount'])
            ? $params['price_discount']
            : $params['price'];

        Session::push('cart.'.$params['slug'], $params);

        return $this;
    }

    public function get(string $slug = null)
    {
        return Session::get('cart.'.$slug);
    }

    public function all()
    {
        return Session::get('cart');
    }

    public function increment(string $slug)
    {
        Session::increment('cart.'.$slug.'.0.add');

        $newPayment = $this->getPaymentUnit($slug);

        Session::put('cart.'.$slug.'.0.payment', $this->covertToMoney($newPayment*Session::get('cart.'.$slug.'.0.add')));

        return $this;
    }

    public function decrement(string $slug)
    {
        Session::decrement('cart.'.$slug.'.0.add');

        $newPayment = $this->getPaymentUnit($slug);

        Session::put('cart.'.$slug.'.0.payment', $this->covertToMoney($newPayment*Session::get('cart.'.$slug.'.0.add')));

        return $this;
    }

    public function update(string $key, $value)
    {
        return Session::put('cart.'.$key, $value);
    }

    public function getPaymentUnit(string $slug)
    {
        return Session::exists('cart.'.$slug.'.0.price_discount')
            ? $this->covertToBackEndFormat(Session::get('cart.'.$slug.'.0.price_discount'))
            : $this->covertToBackEndFormat(Session::get('cart.'.$slug.'.0.price'));
    }

    public function remove(string $key)
    {
        return Session::forget('cart.'.$key);
    }
}
