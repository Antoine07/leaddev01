<?php

require __DIR__ . '/vendor/autoload.php';

// importer plusieurs classes du même namepsace 
use Park\{Car, Plane};

Car::setSpeed(180);

$kia = new Car("Kia");

$kia->park('Place de la liberté', '56A');

echo $kia;

echo "Vitesse Kia {$kia::speed()}";

echo PHP_EOL;
Plane::setSpeed(1000);

$airbus = new Plane('Airbus A320 ');
$airbus->setCagorie("Electric");

echo "Vitesse Airbus {$airbus::speed()}";
echo PHP_EOL;

echo $airbus;


//
echo $kia;

echo "Vitesse Kia {$kia::speed()}";