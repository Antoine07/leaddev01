<?php

namespace Providers;

trait TraitsNumbersFibonacci
{

    public function terms(): array
    {

        return [
            [1, 1, 2, 1],
            [1, 2, 3, 2],
            [2, 3, 5, 3],
            [3, 5, 8, 4],
            [5, 8, 13, 5],
            [8, 13, 21, 6],
            [13, 21, 34, 7],
            [21, 34, 55, 8],
            [34, 55, 89, 9],
            [55, 89, 144, 10],
        ];
    }

    public function termsNb()
    {

        return [
            [1],
            [2],
            [3],
            [4],
            [5],
            [6],
            [7],
            [8],
            [9],
        ];
    }
}
