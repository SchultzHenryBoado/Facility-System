<?php

use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Auth;
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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();



Route::get('/schedule', [UserController::class, 'schedule']);

Route::post('/login/process', [UserController::class, 'process']);

Route::middleware(['middleware' => 'admin'])->group(function () {
    Route::get('/dashboard', [UserController::class, 'index'])->name('admin_dashboard');
});

Route::middleware(['middleware' => 'auth'])->group(function () {
    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
});
