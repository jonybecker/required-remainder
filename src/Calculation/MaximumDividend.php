<?php

declare(strict_types=1);

namespace RequiredRemainder\Calculation;

use Exception;
use RequiredRemainder\Dto\InputCalculation;

class MaximumDividend
{
    private InputCalculation $input;

    public static function createFromInput(InputCalculation $input): self
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
