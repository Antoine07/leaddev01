<?php

class User{

}

$pdo = new \PDO('sqlite::memory:');

$pdo->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);

$pdo->exec(
    "CREATE TABLE IF NOT EXISTS user
  (
    id INTEGER PRIMARY KEY AUTOINCREMENT,
    username VARCHAR( 225 )
  )
    "
);

$pdo->query('INSERT INTO user (username) VALUES ("Alan"), ("Sophie")');

$stmt = $pdo->query("SELECT * FROM user");

$users = $stmt->fetchAll(\PDO::FETCH_CLASS, 'User');

var_dump($users);