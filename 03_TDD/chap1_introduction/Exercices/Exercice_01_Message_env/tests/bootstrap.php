<?php

require_once __DIR__.'/../vendor/autoload.php';

// importe le fichier .env dans les tests 
$dotenv = Dotenv\Dotenv::createImmutable(__DIR__ . '/..');
$dotenv->load();
