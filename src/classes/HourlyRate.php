<?php

namespace src\classes;

require_once 'src\classes\AbstractRate.php';

class HourlyRate extends AbstractRate
{
    protected $priceForKm = 0;
    protected $priceForTime = 200;

    public function calculateTotalPrice()
    {
        parent::calculateTotalPrice();
        $hours = ceil($this->minutes / 60);
        return ($this->km * $this->priceForKm + $hours * $this->priceForTime) * $this->youthRatio + $this->additionalServicesCost;
    }
}
