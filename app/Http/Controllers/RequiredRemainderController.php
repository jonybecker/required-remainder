<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Models\MaximumDividend;
use App\Presenter\CalculationTaskParser;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class RequiredRemainderController extends Controller
{
    public function __invoke(Request $request): Response
    {
        $tasks = $request->post('tasks');

        $solvedTasks = [];
        try {
            if(!is_array($tasks)) {
                throw new Exception('Invalid input. Expected array of tasks');
            }

            foreach($tasks as $task) {
                $solvedTasks[] = $this->solveSingleTask((string)$task);
            }

        } catch(Exception $e) {
            return new Response([
                'solved' => [],
                'message'=> $e->getMessage()
            ], Response::HTTP_BAD_REQUEST);
        }

        return new Response(['solved' => $solvedTasks], Response::HTTP_CREATED);
    }

    private function solveSingleTask(string $task)
    {

        $taskDto = CalculationTaskParser::createFromString($task);

        $maximumDividend = MaximumDividend::loadTask($taskDto);

        return (string)$maximumDividend->calculate();
    }
}
