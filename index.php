<?php

require_once 'src\classes\BaseRate.php';
require_once 'src\classes\HourlyRate.php';
require_once 'src\classes\DailyRate.php';
require_once 'src\classes\StudentRate.php';

use src\classes\BaseRate;
use src\classes\HourlyRate;
use src\classes\DailyRate;
use src\classes\StudentRate;

try {
    //В строке 16 создайте нужный Вам объект/тариф с необходимыми данными.
    $obj = new BaseRate(1, 1, 18, true, false);
    $result = $obj->calculateTotalPrice();
    echo "Сумма вашей поездки составялет: $result руб.";
} catch (Exception $e) {
    echo 'Ошибка: ' . $e->getMessage();
}
