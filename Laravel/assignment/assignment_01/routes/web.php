<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Student\StudentController;
use App\Http\Controllers\Student\ApiController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return redirect('students');
});
Route::resource('students', StudentController::class);

//route for export import 
Route::get('students/export', [StudentController::class, 'export']);
Route::post('students/import', [StudentController::class, 'import']);

//api route
Route::get('/ajax/students/' , [ApiController::class, 'showList']);
Route::get('/ajax/students/create' , [ApiController::class, 'showCreate']);
Route::get('/ajax/students/{student}/edit' , [ApiController::class, 'showEdit']);
