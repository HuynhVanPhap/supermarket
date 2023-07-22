<?php

namespace App\Traits;

trait StatusTrait
{
    public $order;

    public function __construct()
    {
        $this->order = ['Pending', 'Processing', 'Shipped', 'Received', 'Paymented'];
    }

    public function covertOrder(int $status) {
        return __($this->order[$status]);
    }
}
