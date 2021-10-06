<?php

namespace App;

class Fibo
{
    // on initialise les deux premiers termes de la suite 
    private $terms = [1, 1];

    public function __construct(private int $max = 20)
    {
    }

    public function __get($name)
    {
        if (property_exists($this, $name))
            return $this->$name;
    }


    public function run(){

        [$a, $b] = $this->terms;

        while($this->max > 0){

            // ré-assigne les valeurs $a = $b et $b = $a + $b
            [$a, $b] = [$b, $a + $b];
            
            // On ajoute $b le nouveau terme à la suite, le spread operator permet de décompacter les éléments du tableau => les sortir du tableau
            $this->terms = [ ...$this->terms, $b ];

            $this->max--;
        }

    }
}