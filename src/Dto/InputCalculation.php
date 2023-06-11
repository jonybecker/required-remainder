<?php

declare(strict_types=1);

namespace RequiredRemainder\Dto;

class InputCalculation
{
    private int $divisor;
    private int $requiredRemainder;
    private int $maximumDividend;

    public function __construct(int $divisor, int $requiredRemainder, int $maximumDividend)
    {
        $this->divisor = $divisor;
        $this->requiredRemainder = $requiredRemainder;
        $this->maximumDividend = $maximumDividend;
    }

    public function getDivisor(): int
    {
        return $this->divisor;
    }

    public function getRequiredRemainder(): int
    {
        return $this->requiredRemainder;
    }

    public function getMaximumDividend(): int
    {
        return $this->maximumDividend;
    }

}
