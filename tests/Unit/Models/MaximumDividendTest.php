<?php

declare(strict_types=1);

namespace Tests\Unit\Models;

use App\Entity\CalculationTaskDto;
use App\Models\MaximumDividend;
use Mockery;
use Tests\TestCase;

class MaximumDividendTest extends TestCase
{
    public function testRunsCalculation(): void
    {
        $task = Mockery::mock(CalculationTaskDto::class);
        $task->shouldReceive('getDivisor')->andReturn(7);
        $task->shouldReceive('getRequiredRemainder')->andReturn(5);
        $task->shouldReceive('getMaximumDividend')->andReturn(12345);

        $maximumDividend = MaximumDividend::loadTask($task);
        $this->assertSame(12339, $maximumDividend->calculate());
    }

    public function testThrowsException(): void
    {
        $task = Mockery::mock(CalculationTaskDto::class);
        $task->shouldReceive('getDivisor')->andReturn(7);
        $task->shouldReceive('getRequiredRemainder')->andReturn(8);
        $task->shouldReceive('getMaximumDividend')->andReturn(100);

        $maximumDividend = MaximumDividend::loadTask($task);
        $this->expectExceptionMessage('No maximum dividend found');
        $maximumDividend->calculate();
    }

}
