<?php

namespace App;

class FiboYield
{
    public function __construct()
    {
    }

    public function run($max = 20)
    {

        [$a, $b] = [1, 1];

        yield $a;
        yield $b;

        while ($max > 0) {
            $max--;

            [$a, $b] = [$b, $a + $b];
            
            yield $b;
        }
    }
}
