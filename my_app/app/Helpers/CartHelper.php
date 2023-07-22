<?php

namespace App\Helpers;

use Illuminate\Support\Collection;
use Illuminate\Support\Str;

class CartHelper
{
    protected $cart;
    protected $packId;

    /**
     *
     */
    public function __construct(array $params)
    {
        $this->cart = collect($params);
    }

    public function getPackId()
    {
        $this->packId = Str::random(12);;
    }

    public function add()
    {

    }
}
