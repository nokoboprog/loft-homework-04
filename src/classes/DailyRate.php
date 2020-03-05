<?php

namespace src\classes;

require_once 'src\classes\AbstractRate.php';

class DailyRate extends AbstractRate
{
    protected $priceForKm = 1;
    protected $priceForMinutes = 1000 / (24 * 60);


    public function calculateTotalPrice()
    {
        $days = $this->minutes / 1440;
        if (($this->minutes % 1440) > 30) {
            $days++;
        }
        $this->minutes = (int)$days * (60 * 24);
        return parent::calculateTotalPrice();
    }
}
