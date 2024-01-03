<?php

use App\Http\Controllers\AuthenticationController;
use App\Http\Controllers\LoginController;
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
Route::get('/login', [AuthenticationController::class, 'showLoginForm']);
Route::post('/authenticate', [AuthenticationController::class, 'authenticate']);

// Route dla logowania
Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
