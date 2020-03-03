<?php

namespace src\classes;

require_once 'src\classes\AbstractRate.php';

class StudentRate extends AbstractRate
{
    const PRICE_FOR_KM = 4;
    const PRICE_FOR_MIN = 1;

    public function calculateTotalPrice()
    {
        return ($this->km * self::PRICE_FOR_KM + $this->minutes * self::PRICE_FOR_MIN) * $this->youthRatio + $this->additionalServicesCost;
    }
}
