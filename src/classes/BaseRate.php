<?php

namespace src\classes;

require_once 'src\classes\AbstractRate.php';

class BaseRate extends AbstractRate
{
    protected $priceForKm = 10;
    protected $priceForMinutes = 3;
}
