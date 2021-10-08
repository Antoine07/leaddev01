Feature: Calculator memory
    In order to calculate addition
    As a calculator user 
    I must be able to perform basic addition memorization operations and clear memory

Scenario Outline: Eating
    Given a numbers <number1> <number2> 
    Then I should have <sum> in memory

    Examples:
        | number1 | number2 | sum  |
        |  12     |  5      |  17  |
        |  20     |  5      |  25  |