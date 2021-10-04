<?php
// Framework de tests PHPUNIT
use PHPUnit\Framework\TestCase;

use App\Message;

class MessageTest extends TestCase
{

    protected Message $message;
    protected $array = [];

    public function setUp(): void
    {
        $this->message = new Message($_ENV['LANGUAGE'] ?? 'en');
        // $this->array = [];
        var_dump($this->array); 

        
    }

    public function tearDown():void{

        var_dump("FERMETURE DE LA RESSOURCE");
    }

    /**
     * @test testIfExistEnv variables env exists ?
     */
    public function testIfExistEnv()
    {
        $this->array[] = 2;
        $this->assertTrue(isset($_ENV['LANGUAGE']));

        $this->message->add(1);
    }

    /**
     * @test testVariableEnv variables env 
     */
    public function testVariableEnv()
    {
        $this->array[] = 3;
        $this->message->add(2);

        $this->assertContains($_ENV['LANGUAGE'], ['fr', 'en']);
    }

     /**
     * @test testTranslateEnv translation function env 
     */
    public function testTranslateEnv()
    {
        // ne pas faire ça avec un test et une condition pour faire passer un test vous risquez de ne pas faire un test ... 
        // if(false) {
        //     $this->assertTrue(true);
        // }

        $this->array[] = 4;
        $this->message->add(3);

        $this->message->setLang('en');
        $this->assertSame("Hello World!",$this->message->get());

        $this->message->setLang('fr');
        $this->assertSame("Bonjour tout le monde!",$this->message->get());
        var_dump($this->message->getArray()); 
    }

}
