<?php

require_once __DIR__ . '/vendor/autoload.php';

use User\{User, UserRepository, Connect};

$connect = new Connect(host: "localhost", login: "root", password: "123", storage: new SplObjectStorage);
$repository = new UserRepository($connect);

$repository->add(new User("Alan", 45));
$repository->add(new User("Sophie", 19));
$repository->add(new User("Alice", 39));
$repository->add(new User("Bernard", 43));
$repository->add(new User("Michel", 47));

foreach( $repository->all() as $user){
    var_dump($user);
}