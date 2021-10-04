<?php
// Framework de tests PHPUNIT
use PHPUnit\Framework\TestCase;

use App\Message;

class MessageTest extends TestCase
{

    protected Message $message;

    public function setUp(): void
    {
        $this->message = new Message($_ENV['LANGUAGE'] ?? 'en');
    }

    /**
     * @test testIfExistEnv variables env exists ?
     */
    public function testIfExistEnv()
    {
        $this->assertTrue(isset($_ENV['LANGUAGE']));
    }

    /**
     * @test testVariableEnv variables env 
     */
    public function testVariableEnv()
    {
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

        $this->message->setLang('en');
        $this->assertSame("Hello World!",$this->message->get());

        $this->message->setLang('fr');
        $this->assertSame("Bonjour tout le monde!",$this->message->get());
    }

}
