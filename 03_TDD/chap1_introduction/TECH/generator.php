<?php
function gen(){
    yield 1;
    yield 2;
    yield 3;
}

// création d'une instance 
$gen = gen(); 

foreach($gen as $num) echo $num; // 1, 2, 3

if( $gen->valid() === false ){
    echo "Gen est vide";
}

// Exercice on voudrait avoir "stocker" quelque part les 10 premières valeurs paires entières

// 1 première approche avec empreinte de mémoire 

$even = [];
$num = 0;
$count = 10;
while( $count > 0){
    $even[] = $num;
    $num+=2;
    $count--;
}

foreach($even as $n) echo $n;

// 2 Une meilleur idée avec les générateurs qui sont itérables ... 

function genEven($count = 10){
    $num = 0;
    while( $count > 0 ){
        $count--;
        yield $num += 2;
    }
}

foreach(genEven() as $n) echo $n;