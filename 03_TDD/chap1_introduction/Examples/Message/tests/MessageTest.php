<?php
// Framework de tests PHPUNIT
use PHPUnit\Framework\TestCase;

use App\Message;

class MessageTest extends TestCase{

    protected Message $message;

    public function setUp():void{
        $this->message = new Message('en');
    }

    public function testOne(){

        $this->assertSame("Hello World!",$this->message->get());
    }
}
