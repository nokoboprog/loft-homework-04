<?php

namespace src\classes;

require_once 'src\interfaces\RateInterface.php';
require_once 'src\traits\GpsTrait.php';
require_once 'src\traits\SecondDriverTrait.php';

use Exception;
use src\interfaces\RateInterface;
use src\traits\GpsTrait;
use src\traits\SecondDriverTrait;

abstract class AbstractRate implements RateInterface
{
    use GpsTrait;
    use SecondDriverTrait;

    const AGE_MIN = 18;
    const AGE_MAX = 65;
    const AGE_YOUNG = 21;
    const AGE_STUDENT = 25;
    const GPS_PRICE_PER_HOUR = 15;
    const SECOND_DRIVER_PRICE = 100;
    protected $km;
    protected $minutes;
    protected $youthRatio = 1;
    protected $additionalServicesCost = 0;

    public function __construct($km, $minutes, $age, $isGps = false, $isSecondDriver = false)
    {
        $this->km = $km;
        $this->minutes = $minutes;
        $this->checkAge($age);
        if ($isGps) {
            $this->additionalServicesCost += $this->getGpsCost($minutes);
        }
        if ($isSecondDriver) {
            $this->additionalServicesCost += $this->getSecondDriverCost();
        }
    }

    private function checkAge($age)
    {
        if ($age < self::AGE_MIN || $age > self::AGE_MAX) {
            throw new Exception('Ваш возраст не подходит для управления автотранспортом.');
        } elseif ($age > self::AGE_STUDENT && $this instanceof StudentRate) {
            throw new Exception('Ваш возраст не подходит для данного тарифа, выберите другой.');
        } elseif ($age >= self::AGE_MIN && $age <= self::AGE_YOUNG) {
            $this->youthRatio = 1.1;
        }
    }

    abstract public function calculateTotalPrice();
}
