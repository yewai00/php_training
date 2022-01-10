<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Student\ApiController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::group([], function(){
    Route::get('students/list', [ApiController::class, 'getList']);
    Route::get('students/majorsList', [ApiController::class, 'getMajors']);
    Route::get('students/{student}/edit', [ApiController::class, 'editAjax']);
    Route::delete('students/{student}',[ApiController::class, 'destroy']);
    Route::put('students/{student}', [ApiController::class, 'update']);
});

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
