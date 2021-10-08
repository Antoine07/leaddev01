<?php

namespace App;

class Calculator{

    public function __construct(private int $precision = 2, private array $memory = [])
    {
    }

    public function add(float $a, float $b): float
    {
        $result = round($a + $b, $this->precision) ;
        $this->memory[] = $result;

        return $result;
    }
}