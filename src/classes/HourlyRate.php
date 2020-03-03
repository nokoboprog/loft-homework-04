<?php

namespace src\classes;

require_once 'src\classes\AbstractRate.php';

class HourlyRate extends AbstractRate
{
    const PRICE_FOR_KM = 0;
    const PRICE_FOR_HOUR = 200;

    public function calculateTotalPrice()
    {
        $hours = ceil($this->minutes / 60);
        return ($this->km * self::PRICE_FOR_KM + $hours * self::PRICE_FOR_HOUR) * $this->youthRatio + $this->additionalServicesCost;
    }
}
