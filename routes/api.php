<?php

use App\Http\Controllers\api\EmployeeController;
use App\Http\Controllers\api\EmployeeProjectsController;
use App\Http\Controllers\api\ProjectController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::apiResource('employees', EmployeeController::class);
Route::apiResource('projects', ProjectController::class);
Route::post('employee-projects/{employee_id}', [EmployeeProjectsController::class, 'store']);
