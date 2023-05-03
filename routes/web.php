<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\RoomController;
use App\Http\Controllers\ReservationController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\AdminAuthController;

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

Route::resource('/backend/users', UserController::class);

Route::resource('/backend/rooms', RoomController::class);

Route::resource('/backend/reservations', ReservationController::class);

Route::resource('/backend/dashboard', DashboardController::class);

Route::get('/xmlReservation', [ReservationController::class,'displayXMLFile'])->name('xmlReservation');

Route::get('/xsltReservation', [ReservationController::class,'displayDesignXML'])->name('xsltReservation');

//Login
Route::get('/adminlogin', [AdminAuthController::class, 'showLoginForm']);
Route::get('/dashboard', [AdminAuthController::class, 'successlogin']);
Route::post('/adminlogin', [AdminAuthController::class, 'login']);
Route::post('/adminlogout', [AdminAuthController::class, 'logout']);


