<?php

declare(strict_types=1);

namespace Tests\unit\Dto;

use RequiredRemainder\Dto\InputCalculation;
use RequiredRemainder\Parser\InputCalculationParser;
use Tests\TestCase;

class InputCalculationTest extends TestCase
{
    public function testLoadsCalculationInput(): void
    {
        $divisor = 5;
        $requiredRemainder = 0;
        $maximumDividend = 20;

        $inputCalculation = new InputCalculation($divisor, $requiredRemainder, $maximumDividend);

        $this->assertSame($divisor, $inputCalculation->getDivisor());
        $this->assertSame($requiredRemainder, $inputCalculation->getRequiredRemainder());
        $this->assertSame($maximumDividend, $inputCalculation->getMaximumDividend());
    }

}
