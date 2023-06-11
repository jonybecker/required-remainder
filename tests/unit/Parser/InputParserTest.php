<?php

declare(strict_types=1);

namespace Tests\unit\Parser;

use RequiredRemainder\Parser\InputParser;
use Tests\TestCase;

class InputParserTest extends TestCase
{
    public function testParse(): void
    {
        $testInput = '2'.PHP_EOL.'5 0 20'.PHP_EOL.'3 0 45';

        $input = InputParser::parse($testInput);

        $this->assertSame(2, $input->getTestCases());
        $this->assertCount(2, $input->getCalculations());
    }

}
