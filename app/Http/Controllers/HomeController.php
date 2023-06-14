<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Http\Traits\SolveSingleTask;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\View\View;

class HomeController extends Controller
{
    use SolveSingleTask;

    public function __invoke(Request $request): View
    {
        $tasksInput = $request->post('tasks', null);

        $solvedTasks = [];
        if(!empty($tasksInput)){
            try {
                $tasks = trim($tasksInput);
                $tasks = explode("\n", $tasks);

                array_shift($tasks);

                foreach($tasks as $task) {
                    $solvedTasks[] = $this->solveSingleTask((string)$task);
                }

            } catch(Exception $e) {
                $exceptionMessage = $e->getMessage();
            }
        }

        return view('welcome')
            ->with('solved', implode("\n", $solvedTasks))
            ->with('tasks', $tasksInput)
            ->with('exceptionMessage', $exceptionMessage ?? null);
    }
}
