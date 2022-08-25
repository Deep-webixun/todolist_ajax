<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AddTaskController;

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

Route::get('', [AddTaskController::class, 'index']); 

Route::post('add_task', [AddTaskController::class, 'addtask']); 
Route::get('fetch', [AddTaskController::class, 'fetch_tasks']); 

Route::get('delete/{id}', [AddTaskController::class, 'destroy']);
