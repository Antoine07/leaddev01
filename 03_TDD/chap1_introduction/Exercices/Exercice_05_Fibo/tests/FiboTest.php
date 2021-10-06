<?php

use App\Fibo;
use PHPUnit\Framework\TestCase;
use Providers\TraitsNumbersFibonacci;

class FiboTest extends TestCase
{

    protected Fibo $fibo;
    use TraitsNumbersFibonacci;

    public function setUp(): void
    {
        $this->fibo = new Fibo(max: 10);
        $this->fibo->run();
    }

    /**
     * TODO translate
     * @test testMax tester si on a une valeur de max par défaut
     * @covers Fibo::max 
     */
    public function testDefaultMax()
    {   
        // instance de reflexion class avec le type de classe
        $reflectionClass = new ReflectionClass(Fibo::class);
        // récupérer la pp
        $reflectionProperty = $reflectionClass->getProperty('max');
        // on rend accessible la pp
        $reflectionProperty->setAccessible(true);
        // on accède à la pp en repassant l'instance de Fibo à getValue
        $max = $reflectionProperty->getValue(new Fibo()) ;

        $this->assertSame(20, $max);
    }

    /**
     * TODO translate
     * @test testFirstsTermSuite tester que les deux premiers termes de la suite sont 1 et 1
     */
    public function testFirstsTermSuite()
    {
        // assignation des valeurs nouvelle syntaxe PHP
        [$num1, $num2] = [$this->fibo->terms[0], $this->fibo->terms[1]];

        $this->assertEquals(1, $num1);
        $this->assertEquals(1, $num2);
    }

    /**
     * @test testConsecutiveTerm on teste que la somme des deux termes consécutifs est bien égale au terme suivant
     * @dataProvider terms
     */
    public function testConsecutiveTerm($a, $b, $expected, $n)
    {
        [$num1, $num2] = [$this->fibo->terms[$n - 1], $this->fibo->terms[$n]];

        $this->assertEquals($num1, $a);
        $this->assertEquals($num2, $b);
        $this->assertEquals($expected, $num1 + $num2);
    }
}
