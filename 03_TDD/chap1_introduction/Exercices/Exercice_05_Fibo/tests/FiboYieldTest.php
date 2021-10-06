<?php

use App\FiboYield;
use PHPUnit\Framework\TestCase;
use Providers\TraitsNumbersFibonacci;

class FiboYieldTest extends TestCase
{

    protected FiboYield $fibo;
    use TraitsNumbersFibonacci;

    public function setUp(): void
    {

        $this->fibo = new FiboYield();
    }


    /**
     * TODO translate
     * @test testFirstsYieldTermSuite tester que les deux premiers termes de la suite sont 1 et 1
     */
    public function testFirstsYieldTermSuite()
    {
        // assignation des valeurs nouvelle syntaxe PHP

        $this->assertEquals(1, $this->fibo->run()->current());
    }

    /**
     * TODO translate
     * @test testConsecutiveYieldTermSuite tester que les deux premiers termes de la suite sont 1 et 1
     */
    public function testConsecutiveYieldTermSuite()
    {
        
        $numbers = [1, 1, 2, 3, 5];
        $gen = $this->fibo->run();

        $this->assertEquals(1, $gen->current());
        $gen->next();
        $this->assertEquals(1, $gen->current());
        $gen->next();
        $this->assertEquals(2, $gen->current());
        $gen->next();
        $this->assertEquals(3, $gen->current());
        $gen->next();
        $this->assertEquals(5, $gen->current());

    }

}
