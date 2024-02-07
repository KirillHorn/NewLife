<?php


use App\Http\Controllers\AuthController;
use App\Http\Controllers\Maincontroller;
use Illuminate\Support\Facades\Route;

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

Route::get('/', [Maincontroller::class , 'index']);

Route::get('registration', [AuthController::class, 'sign_up']);
Route::post('/sign_up_validate', [AuthController::class, 'sign_up_validate']);

Route::get('auth', [AuthController::class, 'sign_in']);
Route::post('/sign_in_validate', [AuthController::class, 'sign_in_validate']);