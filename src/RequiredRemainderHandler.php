<?php

declare(strict_types=1);

namespace RequiredRemainder;

use RequiredRemainder\Calculation\MaximumDividend;
use RequiredRemainder\Dto\Input;

class RequiredRemainderHandler
{
    private Input $input;

    public function __construct(Input $input)
    {
        $this->input = $input;
    }

    public function calculateRequiredRemainder(): string
    {
        $result = '';
        foreach ($this->input->getCalculations() as $calculation) {
            $maximumDividend = MaximumDividend::createFromInput($calculation);
            $result.= (string)$maximumDividend->calculate() . PHP_EOL;
        }

        return $result;
    }
}
