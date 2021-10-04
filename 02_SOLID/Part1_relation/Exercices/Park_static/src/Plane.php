<?php

namespace Park;

final class Plane extends Vehicule
{

    private string $nameCategory;


    /**
     * Attention à cette approche pour définir la vitesse car cela va imposer une valeur pour toutes les instances de classe Plane ou Car
     * le problème ici c'est que la définition de la vitesse est faite dans la classe mère. Il y a donc un problème de conception au niveau des responsabilités attribuées à la classe mère.
     * Ici on aurait du définir la vitesse statiquement à partir des classes filles et non à partir de la classe mère.
     */
    public static function speed(): float
    {

        return self::$speed;
    }

    public static function setSpeed($speed): void
    {
        self::$speed = $speed;
    }


    public function __toString(): string
    {

        return "Name Veicule {$this->getName()} , cat: {$this->nameCategory}" . PHP_EOL;
    }

    public function setCagorie(string $name): void
    {

        $this->nameCategory = $name;
    }
}
