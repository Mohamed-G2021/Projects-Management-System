<?php

use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\EmployeeProjectsController;
use App\Http\Controllers\ProjectController;
use Illuminate\Support\Facades\Route;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::group(['prefix' => LaravelLocalization::setLocale()], function()
{
    Route::get('/', function () {
        return view('welcome');
    });
    Auth::routes();
    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
    Route::resource('employees', EmployeeController::class);
    Route::resource('projects', ProjectController::class);
    Route::get('employee-projects/{employee_id}', [EmployeeProjectsController::class, 'create'])->name('employee-projects.create');
    Route::post('employee-projects/{employee_id}', [EmployeeProjectsController::class, 'store'])->name('employee-projects.store');
});
