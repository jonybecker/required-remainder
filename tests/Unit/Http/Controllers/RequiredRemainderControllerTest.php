<?php

declare(strict_types=1);

namespace Tests\Unit\Http\Controllers;

use App\Http\Controllers\RequiredRemainderController;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Mockery;
use Tests\TestCase;

class RequiredRemainderControllerTest extends TestCase
{
    public function testPopulatesInputAndCalculatesDividend(): void
    {
        $requestMock = Mockery::mock(Request::class);
        $requestMock->shouldReceive('post')
            ->with('tasks')
            ->andReturn([
                "7 5 12345",
            ]);

        $controller = new RequiredRemainderController();

        $response = $controller->__invoke($requestMock);

        $this->assertSame(Response::HTTP_CREATED, $response->getStatusCode());
        $this->assertSame('{"solved":["12339"]}', $response->getContent());
    }

    /**
     * @dataProvider providerInvalidInputs
     */
    public function testThrowsExceptionOnInvalidInput($tasks, string $exceptionMessage): void
    {
        $requestMock = Mockery::mock(Request::class);
        $requestMock->shouldReceive('post')
            ->with('tasks')
            ->andReturn($tasks);

        $controller = new RequiredRemainderController();

        $response = $controller->__invoke($requestMock);

        $this->assertSame(Response::HTTP_BAD_REQUEST, $response->getStatusCode());
        $this->assertSame('{"solved":[],"message":"'.$exceptionMessage.'"}', $response->getContent());
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
