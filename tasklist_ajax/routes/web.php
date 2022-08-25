<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AddtaskController;

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

Route::get('/', [AddtaskController::class, 'index']); //                                              home page
// Route::post('task/store', [AddtaskController::class, 'store']); //                                              home page
Route::post('form', [AddtaskController::class, 'form_submit']);
