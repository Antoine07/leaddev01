<?php

use PHPUnit\Framework\TestCase;

use App\{User, ModelPrepare};

class UserPrepareTest extends TestCase
{

  protected $model;

  public function setUp(): void
  {
    $this->pdo = new \PDO('sqlite::memory:');
    $this->pdo->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);

    $this->pdo->exec(
      "CREATE TABLE IF NOT EXISTS user
          (
            id INTEGER PRIMARY KEY AUTOINCREMENT,
            username VARCHAR( 225 )
          )
            "
    );

    $this->model = new ModelPrepare($this->pdo);

    $users = [
      ['username' => 'Alan'], // id 
      ['username' => 'Sophie'],
      ['username' => 'Bernard'],
    ];

    $this->model->hydrate($users);
  }

  /**
   * @test count method insert
   */
  public function testSeedsCreate()
  {
    $this->assertEquals(3, count($this->model->all()));
  }

  /**
   * @test save method insert
   */
  public function testInsertSave()
  {
    $user = new User;
    $user->username = "Phil";
    $this->model->save($user); 

    $this->assertEquals(4, count($this->model->all()));
  }

  /**
   * @test save method update
   */
  public function testUpdateSave()
  {
    $user = new User;
    $user->username = "Galois";
    $user->id = 1;

    $this->model->update($user) ; 

    $userUpdate = $this->model->find(1);

    $this->assertEquals($userUpdate->username, "Galois");
  }

  /**
   * @test delete resource by id
   */
  public function testDelete()
  {
    $this->model->delete(1);

    $this->assertTrue( $this->model->find(1) === false ); // PDO retourne false si il n'y a pas de données
  }
}
