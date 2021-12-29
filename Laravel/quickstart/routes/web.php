<?php

namespace App\Http\Controllers\Task;

use Illuminate\Support\Facades\Route;

/**
 * Get All Tasks
 */
Route::get('/', 'App\Http\Controllers\Task\TaskController@getTasks'); 
/**
 * Add A New Task
 */
Route::post('/task', 'App\Http\Controllers\Task\TaskController@addTask');

/**
 * Delete An Existing Task
 */
Route::delete('/task/{id}', 'App\Http\Controllers\Task\TaskController@deleteTask');
