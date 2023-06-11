<?php

declare(strict_types=1);

namespace RequiredRemainder\Dto;

class Input
{
    private int $testCases;
    /** @var array InputCalculation[] */
    private array $calculations = [];

    public function getTestCases(): int
    {
        return $this->testCases;
    }

    public function setTestCases(int $testCases): void
    {
        $this->testCases = $testCases;
    }

    /**
     * @return InputCalculation[]
     */
    public function getCalculations(): array
    {
        return $this->calculations;
    }

    public function addCalculation(InputCalculation $calculation): void
    {
        $this->calculations[] = $calculation;
    }
}
