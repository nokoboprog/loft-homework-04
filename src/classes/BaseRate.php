<?php

namespace src\classes;

require_once 'src\classes\AbstractRate.php';

class BaseRate extends AbstractRate
{
    const PRICE_FOR_KM = 10;
    const PRICE_FOR_MIN = 3;

    public function calculateTotalPrice()
    {
        return ($this->km * self::PRICE_FOR_KM + $this->minutes * self::PRICE_FOR_MIN) * $this->youthRatio + $this->additionalServicesCost;
    }
}
