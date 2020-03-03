<?php

namespace src\traits;

use Exception;
use src\classes\BaseRate;
use src\classes\StudentRate;

trait SecondDriverTrait
{
    private function getSecondDriverCost()
    {
        if ($this instanceof BaseRate || $this instanceof StudentRate) {
            throw new Exception('Услуга «Дополнительный водитель» недоступна в данном тарифе.');
        } else {
            return self::SECOND_DRIVER_PRICE;
        }
    }
}
