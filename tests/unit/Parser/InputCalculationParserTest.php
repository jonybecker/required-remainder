<?php

declare(strict_types=1);

namespace Tests\unit\Parser;

use RequiredRemainder\Dto\InputCalculation;
use RequiredRemainder\Parser\InputCalculationParser;
use Tests\TestCase;

class InputCalculationParserTest extends TestCase
{
    public function testLoadsCalculationInput(): void
    {
        $testString = '5 0 20';

        $inputCalculation = InputCalculationParser::createFromString($testString);

        $this->assertInstanceOf(InputCalculation::class, $inputCalculation);
        $this->assertSame(5, $inputCalculation->getDivisor());
        $this->assertSame(0, $inputCalculation->getRequiredRemainder());
        $this->assertSame(20, $inputCalculation->getMaximumDividend());
    }


    public function testThrowsExceptionOnInvalidInput(): void
    {
        $testString = '5020';

        $this->expectExceptionMessage('Invalid input. Expected 3 values separated by space');

        InputCalculationParser::createFromString($testString);
    }


    public function testThrowsExceptionOnModuloOfZero(): void
    {
        $testString = '0 1 20';

        $this->expectExceptionMessage('Invalid input. Modulo by zero is not allowed');

        InputCalculationParser::createFromString($testString);
    }

}
