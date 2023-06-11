<?php

declare(strict_types=1);


use RequiredRemainder\Dto\Input;
use RequiredRemainder\Dto\InputCalculation;
use Tests\TestCase;

class RequiredRemainderTest extends TestCase
{
    public function testPopulatesInputAndCalculatesDividend(): void
    {
        $inputCalculation = Mockery::mock(InputCalculation::class);

        $input = new Input();
        $input->setTestCases(1);
        $input->addCalculation($inputCalculation);

        $this->assertSame(1, $input->getTestCases());
        $this->assertSame([$inputCalculation], $input->getCalculations());
    }
}
