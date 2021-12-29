<?php

namespace App\Contracts\Dao\Task;

use Illuminate\Http\Request;

/**
 * Interface for Data Accessing Object of Post
 */
interface TaskDaoInterface
{   
    /**
     * To get post list
     * @return array $postList Post list
     */
    public function getTasks();

    /**
     * To add new tasks
     */
    public function addTask(Request $request);

    /**
     * To delete tasks
     */
    public function deleteTask($id);
}