<?php
namespace App\Dao\Task;

use App\Models\Task;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Contracts\Dao\Task\TaskDaoInterface;


/**
 * Service class for task.
 */
class TaskDao implements TaskDaoInterface
{
    /**
    * Get All Tasks
    */
  public function getTasks()
  {
    $tasks = Task::orderBy('created_at', 'asc')->get();
    return $tasks;
  }

  /**
    * Add A New Task
    */
  public function addTask(Request $request){
    $validator = Validator::make($request->all(), [
        'name' => 'required|max:255',
    ]);
    if ($validator->fails()) {
        return redirect('/')
            ->withInput()
            ->withErrors($validator);
    }
    $task = new Task;
    $task->name = $request->name;
    $task->save();

    return redirect('/');
  }

  /**
    * Delete A New Task
    */
  public function deleteTask($id){
    Task::findOrFail($id)->delete();
  }
}