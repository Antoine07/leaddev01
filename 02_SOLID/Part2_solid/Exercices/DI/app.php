<?php

spl_autoload_register(function ($class) {
    include __DIR__ . '/' . $class . '.php';
});

$alan = new User(new SplObjectStorage());
$sophie = new User(new SplObjectStorage());

$container = new Container( new SplObjectStorage() );

// Définition des services puis on les place dans notre "container Services"
$sql = new Interest('SQL');
$bigData = new Interest('Big Data');

// Ajout des services au conteneur
$container->setStorage($sql, 'SQL');
$container->setStorage($bigData, 'Big Data');

$container->getStorage('SQL');

// User => consomme les services définis dans le container
$alan->setInterest($container->getStorage('SQL')); // injection de dépendance du même service
$sophie->setInterest($container->getStorage('SQL')); // injection de dépendance du même service
$sophie->setInterest($container->getStorage('Big Data'));

var_dump($container->getStorage('SQL'));

var_dump($sophie->getInterests());



/*

$container->set('sql', function() {
    return new Interest( "SQL" );
});

$container->get('sql'); // appeler la fonction anonyme et donc créer l'instance de l'intérêt

 */