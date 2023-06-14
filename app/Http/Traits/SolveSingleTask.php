<?php

declare(strict_types=1);

namespace App\Http\Traits;

use App\Models\MaximumDividend;
use App\Presenter\CalculationTaskParser;

trait SolveSingleTask
{
    private function solveSingleTask(string $task)
    {
        $taskDto = CalculationTaskParser::createFromString($task);

        $maximumDividend = MaximumDividend::loadTask($taskDto);

        return (string)$maximumDividend->calculate();
    }
}
