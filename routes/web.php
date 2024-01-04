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
Route::get('/login', [AuthenticationController::class, 'showLoginForm'])->name('login-form');
Route::post('/authenticate', [AuthenticationController::class, 'authenticate'])->name('authenticate');

Route::resources(
    [
        'users' => UserController::class,
    ]
);

Route::group(
    ['middleware' => ['auth']],
    function () {
        Route::get('/dashboard', [DashboardController::class, 'main'])->name('dashboard');
    }
);
