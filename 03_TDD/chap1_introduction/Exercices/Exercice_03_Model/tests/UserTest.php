<?php

use PHPUnit\Framework\TestCase;
use Symfony\Component\Yaml\Parser;

use App\{User, Model};

class UserTest extends TestCase
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
            username VARCHAR( 225 ),
            createdAt DATETIME
          )
            "
    );

    $this->model = new Model($this->pdo);

    $yaml = new Parser();
    $users = $yaml->parse(file_get_contents(__DIR__ . '/_data/seed.yml'))['users'];

    $this->model->hydrate($users);
  }

  /**
   * @test count method insert
   */
  public function testSeedsCreate()
  {
    $this->assertEquals(11, count($this->model->all()));
  }

  /**
   * @test save method insert
   */
  public function testInsertSave()
  {
    $user = new User;
    $user->username = "Phil";
    $this->model->save($user); 

    $this->assertEquals(12, count($this->model->all()));
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
