<?php

namespace App\Http\Controllers\Task;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use App\Contracts\Services\Task\TaskServiceInterface;

class TaskController extends Controller
{
    public function __construct(TaskServiceInterface $taskServiceInterface) {
        $this->taskInterface = $taskServiceInterface;
    }
    /**
    * Get All Tasks
    */
    public function getTasks() { 
        $tasks = $this->taskInterface->getTasks();
        return view('tasks', compact('tasks')); 
    }

    /**
    * Add A New Task
    */
    public function addTask(Request $request) {
        $validator = Validator::make($request->all(), [
            'name' => 'required|max:255',
        ]);
        if ($validator->fails()) {
            return redirect('/')
                ->withInput()
                ->withErrors($validator);
        }
        $tasks = $this->taskInterface->addTask($request);
        if ($tasks) {
            return redirect('/');
        }
    }

    /**
    * Delete A New Task
    */
    public function deleteTask($id) {
        $tasks = $this->taskInterface->deleteTask($id);
        return redirect('/');
    }
}
