<?php

use App\Analyse;
use PHPUnit\Framework\TestCase;

class AnalyseTest extends TestCase
{

    private string $analyse;

    public function setUp(): void
    {
        $this->analyse = new Analyse($file = __DIR__ . "/_Data/titanic.csv");
    }

    public function testMessage()
    {
        $this->assertEquals("Analyse Data Titanic", (string) $this->analyse);
    }
}
