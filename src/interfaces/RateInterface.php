<?php

namespace src\interfaces;

interface RateInterface
{
    public function getInfo();

    public function calculateTotalPrice();
}
