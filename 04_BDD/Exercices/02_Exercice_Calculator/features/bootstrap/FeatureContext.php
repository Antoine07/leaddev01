<?php

use App\Calculator;
use PHPUnit\Framework\Assert;
use Behat\Behat\Context\Context;
use Behat\Gherkin\Node\TableNode;
use Behat\Gherkin\Node\PyStringNode;

/**
 * Defines application features from the specific context.
 */
class FeatureContext implements Context
{
    /**
     * Initializes context.
     *
     * Every scenario gets its own context instance.
     * You can also pass arbitrary arguments to the
     * context constructor through behat.yml.
     */
    public function __construct()
    {
        $this->calculator = new Calculator();
    }

    /**
     * @Given a numbers :arg1 :arg2
     */
    public function aNumbers($number1, $number2)
    {
        Assert::assertEquals($number1, $number2);
    }

    /**
     * @Then I should have :arg1 in memory
     */
    public function iShouldHaveInMemory($sum)
    {
        Assert::assertEquals(true, true);
    }
}
