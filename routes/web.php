<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RoomController;
use App\Http\Controllers\RoomTypeController;
use App\Http\Controllers\ReservationController;

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
    return view('index');
});

Route::get('/AboutUs', function () {
    return view('about-us');
});

Route::get('/BlogDetails', function () {
    return view('blog-details');
});

Route::get('/Blog', function () {
    return view('blog');
});

Route::get('/Contact', function () {
    return view('contact');
});


// --------------- Room Types ---------------

Route::get('/Room', function () {
    return RoomController::index();
});

Route::get('/RoomDetails/{id}', [RoomController::class, 'show']);

Route::get('RoomType/display', [RoomController::class, 'displayRoomTypesAPI']);

// --------------- Reservation ---------------

Route::post('/Reservation', [ReservationController::class, 'store']);

Route::get('/ReservationDetails', function () {
    return ReservationController::index();
});

// --------------- Payment ---------------

Route::get('/Payment/{id}', [ReservationController::class, 'show']);

Route::post('/Checkout/{id}', [ReservationController::class, 'payment']);

// --------------- XML ---------------

Route::get('/xml-roomTypes', [RoomController::class, 'displayXMLFile'])->name('xml-roomTypes');

Route::get('/RoomTypes', [RoomController::class, 'displayRoomTypes'])->name('RoomTypes');

// Route::get('/xml-reservations', [ReservationController::class, 'displayXMLFile'])->name('xml-reservations');

// Route::get('/reservationsReport', [ReservationController::class, 'displayReservationReport'])->name('reservationsReport');