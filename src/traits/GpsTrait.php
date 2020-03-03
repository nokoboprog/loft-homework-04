<?php

namespace src\traits;

trait GpsTrait
{
    private function getGpsCost($minutes)
    {
        return ceil($minutes / 60) * self::GPS_PRICE_PER_HOUR;
    }
}
