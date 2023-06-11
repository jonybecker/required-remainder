<?php

declare(strict_types=1);

namespace Tests\e2e;

use RequiredRemainder\Parser\InputParser;
use Tests\TestCase;
use RequiredRemainder\RequiredRemainderHandler;

class RequiredRemainderTest extends TestCase
{
    /**
     * @dataProvider requiredRemainderProvider
     */
    public function testGetRequiredRemainder(string $input, string $expectedOutput): void
    {
        $initialTime = microtime(true);

        $input = InputParser::parse($input);
        $requiredRemainder = new RequiredRemainderHandler($input);

        $output = $requiredRemainder->calculateRequiredRemainder();

        $endTime = microtime(true);

        $this->assertEquals($expectedOutput, $output);

        $this->assertGreaterThanOrEqual(($endTime - $initialTime), 1);
    }

    public function requiredRemainderProvider(): array
    {
        return [[
'7
7 5 12345
5 0 4
10 5 15
17 8 54321
499999993 9 1000000000
10 5 187
2 0 999999999
',
            '12339
0
15
54306
999999995
185
999999998
'
        ]];
    }
}
