<?php

namespace App\Services\Task;

use Illuminate\Http\Request;
use App\Contracts\Dao\Task\TaskDaoInterface;
use App\Contracts\Services\Task\TaskServiceInterface;

/**
 * Service class for task.
 */
class TaskService implements TaskServiceInterface {
    /**
     * task dao
     */
    private $taskDao;
    /**
     * Class Constructor
     * @param TaskDaoInterface
     * @return
     */
    public function __construct(TaskDaoInterface $taskDao) {
        $this->taskDao = $taskDao;
    }
    /**
     * Get all tasks
     */
    public function getTasks() {
        return $this->taskDao->getTasks();
    }

    /**
     * Add a new task
     */
    public function addTask(Request $request) {
        return $this->taskDao->addTask($request);
    }
    /**
     * Delete task
     */

    public function deleteTask($id) {
        return $this->taskDao->deleteTask($id);
    }
}