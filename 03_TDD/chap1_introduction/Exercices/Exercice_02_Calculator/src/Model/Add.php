<?php

namespace App\Model;

class Add
{

    public function add(Number $a, Number $b): NumberString
    {

        return new NumberString($a->getNumber() + $b->getNumber());
    }
}
