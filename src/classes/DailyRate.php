<?php

namespace src\classes;

require_once 'src\classes\AbstractRate.php';

class DailyRate extends AbstractRate
{
    const PRICE_FOR_KM = 1;
    const PRICE_FOR_DAY = 1000;

    public function calculateTotalPrice()
    {
        $days = $this->minutes / 1440;
        if (($this->minutes % 1440) > 30) {
            $days++;
        }
        return ($this->km * self::PRICE_FOR_KM + (int)$days * self::PRICE_FOR_DAY) * $this->youthRatio + $this->additionalServicesCost;
    }
}
