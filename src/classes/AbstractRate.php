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
    protected $priceForKm;
    protected $minutes;
    protected $priceForTime;
    protected $age;
    protected $youthRatio = 1;
    protected $isGps;
    protected $isSecondDriver;
    protected $additionalServicesCost = 0;

    public function __construct($km, $minutes, $age, $isGps = false, $isSecondDriver = false)
    {
        $this->km = $km;
        $this->minutes = $minutes;
        $this->age = $age;
        $this->checkAge($age);
        $this->isGps = $isGps;
        $this->isSecondDriver = $isSecondDriver;
    }

    protected function checkAge($age)
    {
        if ($age < self::AGE_MIN || $age > self::AGE_MAX) {
            throw new Exception('Ваш возраст не подходит для управления автотранспортом.');
        } elseif ($age >= self::AGE_MIN && $age <= self::AGE_YOUNG) {
            $this->youthRatio = 1.1;
        }
    }

    public function getInfo()
    {
        echo "Ваш возраст: $this->age<br>";
        echo "Количество пройденных км: $this->km<br>";
        echo "Количество затраченных минут: $this->minutes<br>";
        $gps = $this->isGps === true ? 'Да' : 'Нет';
        echo "Услуга 'GPS': $gps<br>";
        $secondDriver = $this->isSecondDriver === true ? 'Да' : 'Нет';
        echo "Услуга  'Дополнительный водитель': $secondDriver<br>";
    }

    public function calculateTotalPrice()
    {
        if ($this->isGps) {
            $this->additionalServicesCost += $this->getGpsCost($this->minutes);
        }
        if ($this->isSecondDriver) {
            $this->additionalServicesCost += $this->getSecondDriverCost();
        }
        return ($this->km * $this->priceForKm + $this->minutes * $this->priceForTime) * $this->youthRatio + $this->additionalServicesCost;
    }
}
