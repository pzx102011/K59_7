<?php

use App\Http\Controllers\AuthenticationController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\UserController;
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
Route::get('/', fn () => view('welcome'));
Route::get('/login', [AuthenticationController::class, 'index'])->name('login.index');
Route::get('/logout', [AuthenticationController::class, 'logout'])->name('logout');
Route::post('/authenticate', [AuthenticationController::class, 'authenticate'])->name('login.authenticate');

Route::resources(
    [
        'users' => UserController::class,
        'dashboard' => DashboardController::class,
    ]
);
