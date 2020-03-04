<?php

namespace src\classes;

require_once 'src\classes\AbstractRate.php';

class DailyRate extends AbstractRate
{
    protected $priceForKm = 1;
    protected $priceForTime = 1000;


    public function calculateTotalPrice()
    {
        parent::calculateTotalPrice();
        $days = $this->minutes / 1440;
        if (($this->minutes % 1440) > 30) {
            $days++;
        }
        return ($this->km * $this->priceForKm + (int)$days * $this->priceForTime) * $this->youthRatio + $this->additionalServicesCost;
    }
}
