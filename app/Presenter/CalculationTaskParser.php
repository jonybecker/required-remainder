<?php

declare(strict_types=1);

namespace App\Presenter;

use App\Entity\CalculationTaskDto;
use Exception;

class CalculationTaskParser
{
    public const DIVISOR_POSITION = 0;
    public const REMAINDER_POSITION = 1;
    public const MAXIMUM_DIVIDEND_POSITION = 2;

    public static function createFromString(string $strInput): CalculationTaskDto
    {
        $values = explode(' ', $strInput);

        self::validateInput($values);

        return new CalculationTaskDto(
            (int) $values[self::DIVISOR_POSITION],
            (int) $values[self::REMAINDER_POSITION],
            (int) $values[self::MAXIMUM_DIVIDEND_POSITION]
        );
    }

    private static function validateInput(array $values): void
    {
        if(count($values) !== 3) {
            throw new Exception('Invalid input. Expected 3 values separated by space');
        }

        if((int) $values[self::DIVISOR_POSITION] === self::DIVISOR_POSITION) {
            throw new Exception('Invalid input. Modulo by zero is not allowed');
        }
    }

}
