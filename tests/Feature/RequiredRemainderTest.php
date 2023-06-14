<?php

namespace Tests\Feature;

use Tests\TestCase;

class RequiredRemainderTest extends TestCase
{
    public function testApiReturnsASuccessfulResponse(): void
    {
        $initTime = microtime(true);

        $response = $this->postJson('/api/required-remainder', [
            "tasks" => [
                "7 5 12345",
                "5 0 4",
                "10 5 15",
                "17 8 54321",
                "499999993 9 1000000000",
                "10 5 187",
                "2 0 999999999"
            ]
        ]);

        $endTime = microtime(true);

        $response->assertStatus(201);
        $response->assertExactJson([
            "solved" => [
                "12339",
                "0",
                "15",
                "54306",
                "999999995",
                "185",
                "999999998"
            ]
        ]);
        $this->assertGreaterThanOrEqual(($endTime - $initTime), 1);
    }


    /**
     * @dataProvider providerInvalidInputs
     */
    public function testThrowsBadRequestOnInvalidInput($tasks, string $exceptionMessage): void
    {
        $response = $this->postJson('/api/required-remainder', [
            "tasks" => $tasks
        ]);

        $response->assertStatus(400);
        $response->assertExactJson([
            "solved" => [],
            "message" => $exceptionMessage
        ]);
    }

    public function providerInvalidInputs(): array
    {
        return [
            [ ["5020"], 'Invalid input. Expected 3 values separated by space' ],
            [ 'not-an-array', 'Invalid input. Expected array of tasks' ],
            [ ["0 0 0"], 'Invalid input. Modulo by zero is not allowed'],
        ];
    }
}
