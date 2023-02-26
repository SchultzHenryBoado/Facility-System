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




Route::post('/login/process', [UserController::class, 'process']);

Route::middleware(['middleware' => 'admin'])->group(function () {

    Route::controller(UserController::class)->group(function () {
        Route::get('/dashboard', 'index')->name('admin_dashboard');
        Route::get('/logout', 'logout')->name('logout');
    });
});

Route::middleware(['middleware' => 'user'])->group(function () {

    Route::controller(UserController::class)->group(function () {
        Route::get('/schedule', 'schedule');
    });
});
