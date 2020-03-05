<?php

namespace src\classes;

require_once 'src\classes\AbstractRate.php';

class HourlyRate extends AbstractRate
{
    protected $priceForKm = 0;
    protected $priceForMinutes = 200 / 60;

    public function calculateTotalPrice()
    {
        $hours = ceil($this->minutes / 60);
        $this->minutes = $hours * 60;
        return parent::calculateTotalPrice();
    }
}
