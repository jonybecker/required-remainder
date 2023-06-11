<?php

declare(strict_types=1);

namespace Tests\unit\Calculation;

use Mockery;
use RequiredRemainder\Calculation\MaximumDividend;
use RequiredRemainder\Dto\InputCalculation;
use Tests\TestCase;

class MaximumDividendTest extends TestCase
{
    public function testRunsCalculation(): void
    {
        $input = Mockery::mock(InputCalculation::class);
        $input->shouldReceive('getDivisor')->andReturn(7);
        $input->shouldReceive('getRequiredRemainder')->andReturn(5);
        $input->shouldReceive('getMaximumDividend')->andReturn(12345);

        $maximumDividend = MaximumDividend::createFromInput($input);
        $this->assertSame(12339, $maximumDividend->calculate());
    }

    public function testThrowsException(): void
    {
        $input = Mockery::mock(InputCalculation::class);
        $input->shouldReceive('getDivisor')->andReturn(7);
        $input->shouldReceive('getRequiredRemainder')->andReturn(8);
        $input->shouldReceive('getMaximumDividend')->andReturn(100);

        $maximumDividend = MaximumDividend::createFromInput($input);
        $this->expectExceptionMessage('No maximum dividend found');
        $maximumDividend->calculate();
    }

}
