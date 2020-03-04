<?php

namespace src\classes;

use Exception;

require_once 'src\classes\AbstractRate.php';

class StudentRate extends AbstractRate
{
    protected $priceForKm = 4;
    protected $priceForTime = 1;

    protected function checkAge($age)
    {
        parent::checkAge($age);
        if ($age > self::AGE_STUDENT && $this) {
            throw new Exception('Ваш возраст не подходит для данного тарифа, выберите другой.');
        }
    }
}
