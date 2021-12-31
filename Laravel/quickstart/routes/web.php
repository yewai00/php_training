<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\Task\TaskController;

/**
 * Get All Tasks
 */
Route::get('/', [TaskController::class,'getTasks'])->middleware('auth')->name('tasklists'); 

/**
 * Add A New Task
 */
Route::post('/task', [TaskController::class,'addTask']);

/**
 * Delete An Existing Task
 */
Route::delete('/task/{id}', [TaskController::class,'deleteTask']);

Route::get('login', [AuthController::class, 'index'])->name('login');
Route::post('post-login', [AuthController::class, 'postLogin'])->name('login.post'); 
Route::get('registration', [AuthController::class, 'registration'])->name('register');
Route::post('post-registration', [AuthController::class, 'postRegistration'])->name('register.post'); 
Route::get('dashboard', [AuthController::class, 'dashboard']); 
Route::get('logout', [AuthController::class, 'logout'])->name('logout');