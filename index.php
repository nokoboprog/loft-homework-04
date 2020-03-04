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
    echo '<b>Тариф «Базовый»</b><br>';
    $obj = new BaseRate(100, 100, 18, true, false);
    $result = round($obj->calculateTotalPrice());
    echo $obj->getInfo();
    echo "Итоговая сумма поездки по вашему тарифу составляет: <b>$result руб</b>.<br><br>";

    echo '<b>Тариф «Почасовой»</b><br>';
    $obj = new HourlyRate(100, 100, 18, true, true);
    $result = round($obj->calculateTotalPrice());
    echo $obj->getInfo();
    echo "Итоговая сумма поездки по вашему тарифу составляет: <b>$result руб</b>.<br><br>";

    echo '<b>Тариф «Суточный»</b><br>';
    $obj = new DailyRate(100, 1471, 18, true, true);
    $result = round($obj->calculateTotalPrice());
    echo $obj->getInfo();
    echo "Итоговая сумма поездки по вашему тарифу составляет: <b>$result руб</b>.<br><br>";

    echo '<b>Тариф «Студенческий»</b><br>';
    $obj = new StudentRate(100, 100, 18, true, false);
    $result = round($obj->calculateTotalPrice());
    echo $obj->getInfo();
    echo "Итоговая сумма поездки по вашему тарифу составляет: <b>$result руб</b>.<br><br>";
} catch (Exception $e) {
    echo 'Ошибка: ' . $e->getMessage();
}
