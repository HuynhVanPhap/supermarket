<?php

namespace App\Traits;
use Carbon\Carbon;
use DateTime;
use DateTimeZone;

trait DateTimeHelper
{
    protected string $dateTime;

    public function setDateTime(string $dateTime)
    {
        $this->dateTime = $dateTime;
    }

    public function getDateTime()
    {
        return $this->dateTime;
    }

    public function format(string | null $date, string $format = 'd/m/Y H:i:s', string $timezone = 'Asia/Ho_Chi_Minh')
    {
        if (is_null($date)) {
            $this->setDateTime(__('Not denfined datetime'));

            return $this;
        }

        $dateTime = new DateTime($date, new DateTimeZone($timezone));

        $this->setDateTime($dateTime->format($format));

        return $this;
    }

    public function corvertVietnameseDay()
    {
        $dateArr = explode(', ', $this->dateTime);

        $dateArr[0] = config('constraint.days_sub.vi.'.$dateArr[0]);

        return implode(', ', $dateArr);
    }
}
