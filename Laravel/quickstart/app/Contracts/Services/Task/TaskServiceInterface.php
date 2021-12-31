<?php

namespace App\Contracts\Services\Task;

use Illuminate\Http\Request;

/**
 * Interface for Data Accessing Object of Post
 */
interface TaskServiceInterface
{   
    /**
     * To get All Tasks
     * @return array $tasks Task list
     */
    public function getTasks();

    /**
     * To add A New Task
     * @param Request $request request with inputs
     * @return Object $task Task Object
     */
    public function addTask(Request $request);

    /**
     * To delete tasks
     * @param string $id task id
     */
    public function deleteTask($id);
}