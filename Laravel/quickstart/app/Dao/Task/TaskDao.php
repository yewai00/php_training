<?php
namespace App\Dao\Task;

use App\Models\Task;
use Illuminate\Http\Request;
use App\Contracts\Dao\Task\TaskDaoInterface;

/**
 * Service class for task.
 */
class TaskDao implements TaskDaoInterface
{
    /**
    * Get All Tasks
    * @return array $tasks Task list
    */
    public function getTasks()
    {
        $tasks = Task::orderBy('created_at', 'asc')->get();
        return $tasks;
    }

    /**
    * Add A New Task
    * @param Request $request request with inputs
    * @return Object $task Task Object
    */
    public function addTask(Request $request)
    {
        $task = new Task;
        $task->name = $request->name;
        $task->save();
        return $task;
    }

    /**
    * Delete A New Task
    * @param string $id task id
    */
    public function deleteTask($id)
    {
        Task::findOrFail($id)->delete();
    }
}