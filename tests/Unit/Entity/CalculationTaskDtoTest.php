<?php

declare(strict_types=1);

namespace Tests\Unit\Entity;

use App\Entity\CalculationTaskDto;
use Tests\TestCase;

class CalculationTaskDtoTest extends TestCase
{
    public function testLoadsCalculationInput(): void
    {
        $divisor = 5;
        $requiredRemainder = 0;
        $maximumDividend = 20;

        $inputCalculation = new CalculationTaskDto($divisor, $requiredRemainder, $maximumDividend);

        $this->assertSame($divisor, $inputCalculation->getDivisor());
        $this->assertSame($requiredRemainder, $inputCalculation->getRequiredRemainder());
        $this->assertSame($maximumDividend, $inputCalculation->getMaximumDividend());
    }

}
