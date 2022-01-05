<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Student\StudentController;
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

Route::get('students/export', [StudentController::class, 'export']);

Route::post('students/import', [StudentController::class, 'import']);

Route::resource('students', StudentController::class);
