<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\EmployeesController;
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

Route::get('/',  [EmployeesController::class, 'index']);
Route::get('/create',  [EmployeesController::class, 'create'])->name('create');
Route::post('/store',  [EmployeesController::class, 'store'])->name('store');



