<?php

namespace App\Traits;

trait Numeric
{
    public function covert()
    {
        return (int) $this->number;
    }

    public function isValid($number)
    {
        if(gettype($number) === 'int') {
            return true;
        }

        return false;
    }

    public function covertToBackEndFormat(string $number)
    {
        return (int) preg_replace("/([^0-9])/i", "", $number); // Rebuild
    }

    public function covertToMoney(string $str, $decimal = ",", $fraction = ".")
    {
        return number_format($str,"0", $decimal, $fraction);
    }

    public function caculateDiscount(int $price, int $percent)
    {
        if ($percent === 0) {
            return 0;
        }

        $discount = ($price*$percent)/100;

        return $this->covertToMoney((string) ($price - $discount));
    }
}
