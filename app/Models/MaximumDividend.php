<?php

declare(strict_types=1);

namespace App\Models;

use App\Entity\CalculationTaskDto;
use Exception;

class MaximumDividend
{
    private CalculationTaskDto $input;

    public static function loadTask(CalculationTaskDto $input): self
    {
        $maximumDividend = new self();

        $maximumDividend->input = $input;

        return $maximumDividend;
    }

    public function calculate(): int
    {
        for ($dividend = $this->input->getMaximumDividend(); $dividend >= 0; $dividend--) {
            if (($dividend % $this->input->getDivisor()) === $this->input->getRequiredRemainder()) {
                return $dividend;
            }
        }

        throw new Exception('No maximum dividend found');
    }
}
