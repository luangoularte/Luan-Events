<?php 


namespace App\Web\Task\Controllers;

use App\Http\Controllers\Controller;
use App\Web\Task\Requests\TaskRequest;
use Domain\Task\Models\Task;
use Domain\Task\Actions\CreateTaskAction;
use Domain\Task\DTO\TaskData;

class TaskController extends Controller
{
    public function index() 
    {
        //$tasks = app(Task::class)->get();

        $tasks = Task::all();


        return view('welcome', compact('tasks'));
    }

    public function store(TaskRequest $request, CreateTaskAction $action)
    {
        $data = TaskData::formRequest($request);

        $response = $action($data);

        return back()->with(['sucess' => 'Tarefa criada com sucesso']);
    }
}