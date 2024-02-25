<?php

use App\Http\Controllers\AdminController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\Maincontroller;
use App\Http\Controllers\AnimalsController;


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

Route::post('Subscription', [Maincontroller::class , 'Subscription']);
Route::get('registration', [AuthController::class, 'sign_up']);
Route::post('/sign_up_validate', [AuthController::class, 'sign_up_validate']);
Route::get('auth', [AuthController::class, 'sign_in']);
Route::get('sign_out', [AuthController::class, 'sign_out']);
Route::post('/sign_in_validate', [AuthController::class, 'sign_in_validate']);
Route::get('personalCub', [AuthController::class, 'personalCub']);
Route::post('/Phone', [AuthController::class, 'Phone']);
Route::post('/Email', [AuthController::class, 'Email']);
Route::get('/{id}/deleteAnimals', [AuthController::class, 'deleteAnimals']);

Route::get('/AnimalsAdd', [AnimalsController::class, 'AnimalsAdd_view']);
Route::post('/AnimalsAdd_validate', [AnimalsController::class, 'AnimalsAdd_validate']);
Route::get('/{id}/animalsPost', [AnimalsController::class, 'animalsPost']);
Route::post('/{id}/comment_Add', [AnimalsController::class, 'comment_Add']);

Route::get('/Poisk', [AnimalsController::class, 'Poisk']);
Route::post('/Poisk_post', [AnimalsController::class, 'Poisk_post']);


Route::get('/admin', [AdminController::class, 'admin_index'])->name('admins');
Route::get('/changeStatus/{id}/{status}', [AdminController::class, 'changeStatus'])->name('changeStatus');
