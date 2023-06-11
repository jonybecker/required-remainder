<?php

declare(strict_types=1);

namespace Tests\unit\Dto;

use Mockery;
use RequiredRemainder\Dto\Input;
use RequiredRemainder\Dto\InputCalculation;
use Tests\TestCase;

class InputTest extends TestCase
{
    public function testLoadsInput(): void
    {
        $inputCalculation = Mockery::mock(InputCalculation::class);

        $input = new Input();
        $input->setTestCases(1);
        $input->addCalculation($inputCalculation);

        $this->assertSame(1, $input->getTestCases());
        $this->assertSame([$inputCalculation], $input->getCalculations());
    }


}
