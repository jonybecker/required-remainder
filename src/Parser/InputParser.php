<?php

declare(strict_types=1);

namespace RequiredRemainder\Parser;

use RequiredRemainder\Dto\Input;

class InputParser
{
    public static function parse(string $strInput): Input
    {
        $strInput = trim($strInput);
        $strInput = explode("\n", $strInput);

        $input = new Input();
        $input->setTestCases((int) $strInput[0]);

        for ($i = 1; $i <= $input->getTestCases(); $i++) {
            $input->addCalculation(InputCalculationParser::createFromString($strInput[$i]));
        }

        return $input;
    }
}
