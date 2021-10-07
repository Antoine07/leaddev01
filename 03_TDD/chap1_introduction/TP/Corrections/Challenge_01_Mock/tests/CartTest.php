<?php

use PHPUnit\Framework\TestCase;

use Cart\{Cart, Product, Storable};

class CartTest extends  TestCase
{
    protected $cart;
    protected Storable $mockStorage;

    public function setUp(): void
    {
        // Création d'un Mock
        $this->mockStorage = $this->createMock(Storable::class);
        $this->cart = new Cart($this->mockStorage);
        $this->cart->reset();
    }

    public function testAddOneProduct()
    {
        $apple = new Product('apple', 1.5);
        $this->mockStorage->method('getStorage')->willReturn(['apple' => round(10 * 1.5 * 1.2, 2)]);
        $this->cart->buy($apple, 10);
        $this->assertEquals($this->cart->total(), round(10 * 1.5 * 1.2, 2));
    }

    public function testTotalMultipleProducts()
    {
        $apple = new Product('apple', 1.5);
        $orange = new Product('orange', 1.2);
        $bananas = new Product('bananas', 1.3);

        $this->mockStorage->method('getStorage')->willReturn([
            'apple' => 10 * 1.5 * 1.2,
            'orange' => 10 * 1.2 * 1.2,
            'bananas' => 10 * 1.3 * 1.2,
        ]);
        // $this->cart->buy($apple, 10);
        // $this->cart->buy($orange, 10);
        // $this->cart->buy($bananas, 10);
        $sum = 10 * 1.5 * 1.2 + 10 * 1.2 * 1.2 +  10 * 1.3 * 1.2;

        $this->assertEquals($this->cart->total(), round($sum, 2));
    }

    public function testCallResteMethodStorage(){
        
        
        $this->mockStorage->expects($this->cart->reset())->method('reset');
    }

}
