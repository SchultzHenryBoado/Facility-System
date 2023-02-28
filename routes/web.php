<?php

use App\Http\Controllers\CompanyController;
use App\Http\Controllers\FacilityController;
use App\Http\Controllers\FacilityRoomMasterController;
use App\Http\Controllers\FloorController;
use App\Http\Controllers\ReservationController;
use App\Http\Controllers\UserController;
use App\Models\Reservation;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Whoops\Run;

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
        Route::get('/register', 'register');

        Route::post('/register/store', 'store');
        Route::put('/register/{user}', 'update');
    });

    Route::controller(CompanyController::class)->group(function () {
        Route::get('/company', 'index');

        Route::post('/company/store', 'store');
        Route::put('/company/{company}', 'update');
        Route::delete('/company/{company}', 'destroy');
    });

    Route::controller(FloorController::class)->group(function () {
        Route::get('/floor', 'index');
        
        Route::post('/floor/store', 'store');
        Route::put('/floor/{floor}', 'update');
        Route::delete('/floor/{floor}', 'destroy');
    });

    Route::controller(FacilityController::class)->group(function () {
        Route::get('/facility', 'index');

        Route::post('/facility/store', 'store');
        Route::put('/facility/{facility}', 'update');
        Route::delete('/facility/{facility}', 'destroy');
    });

    Route::controller(FacilityRoomMasterController::class)->group(function () {
        Route::get('/facility_room_master', 'index');

        Route::post('/facility_room_master/store', 'store');
        Route::put('/facility_room_master/{facility_room_master}', 'update');
        Route::delete('/facility_room_master/{facility_room_master}', 'destroy');
    });

    Route::controller(ReservationController::class)->group(function () {
        Route::put('/pending_reservation/{reservation}', 'approveStatus');
        Route::put('/pending_reservation/{reservation}', 'rejectStatus');
    });

    Route::get('/pending_reservation', function () {

        $data = Reservation::where('status', 'pending')->get();

        return view('admin.pending_reservation', ['pending' => $data]);
    });

    Route::get('/approved', function () {
        
        $data = Reservation::where('status', 'approved')->get();
        
        return view('admin.approved', ['approve' => $data]);
    });

    Route::get('/cancellation', function () {
        $data = Reservation::where('status', 'reject');
        
        return view('admin.cancellation', ['reject' => $data]);
    });

});

Route::middleware(['middleware' => 'user'])->group(function () {

    Route::controller(UserController::class)->group(function () {
        Route::get('/schedule', 'schedule');
    });

    Route::controller(ReservationController::class)->group(function () {
        Route::get('/reservation', 'index');

        Route::post('/reservation/store', 'store');
        Route::put('/reservation/{reservation}', 'update');
        Route::delete('/reservation/{reservation}', 'destroy');
    });

});
