<?php

use PHPUnit\Framework\TestCase;

use App\User;
use App\Model;

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
            username VARCHAR( 225 )
          )
            "
        );

    }

    /**
     * @test count method insert
     */
    public function testSeedsCreate()
    {

    }

    /**
     * @test save method insert
     */
    public function testInsertSave()
    {

    }

     /**
     * @test save method update
     */
    public function testUpdateSave()
    {
     
    }

    /**
     * @test delete resource by id
     */
    public function testDelete()
    {

    }

}
