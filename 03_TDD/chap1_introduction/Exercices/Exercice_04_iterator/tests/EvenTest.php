<?php

use App\Even;
use PHPUnit\Framework\TestCase;

class EvenTest extends TestCase
{

    protected Even $even ;

    public function setUp():void{

        $this->even = new Even(max : 20);
    }

    public function testEven(){
        $test = true;
        while( $this->even->valid() ){

            if( $this->even->current() % 2) {
                $test = false;
                break;
            }

            $this->even->next(); // +1 position 
        }

        $this->assertTrue( ($test  && $this->even->key() == 20) );
    }

    public function testRewind(){

        $num1 = 0 ; $num2 = 0;
        $even = new Even(max :5); 
        foreach( $even as $key => $current) $num1 = $current;
        foreach( $even as $key => $current) $num2 = $current;

        $this->assertEquals($num1, 8);
        $this->assertEquals($num2, 8);
    }

    public function testIterable(){

        $this->assertTrue( is_iterable( $this->even ) );
    }
}