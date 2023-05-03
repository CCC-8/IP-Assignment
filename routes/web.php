<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Mail;
use App\Mail\HelloMail;
use App\Http\Controllers\SignupController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\PasswordResetController;
use App\Http\Controllers\Auth\ResetPasswordController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\AdminAuthController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\XmlController;

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

//Route::get('/', function () { //login page
//    return view('frontend/login');
//});

//Route::get('/', function () { //register page
//    return view('frontend/register');
//});

//Route::get('/', function () {
//    return view('index');
//});
//
//Route::get('/AboutUs', function () {
//    return view('about-us');
//});
//
//Route::get('/BlogDetails', function () {
//    return view('blog-details');
//});
//Route::get('/Blog', function () {
//    return view('blog');
//});
//Route::get('/Contact', function () {
//    return view('contact');
//});
//Route::get('/RoomDetails', function () {
//    return view('room-details');
//});
//Route::get('/Room', function () {
//    return view('room');
//});

//register page
Route::get('/register', [SignupController::class, 'create']);
Route::post('/register', [SignupController::class, 'store']);

//Log In page
Route::get('/login', [LoginController::class, 'create']);
Route::post('/login', [LoginController::class, 'login']);
Route::get('/index', [LoginController::class, 'successlogin']);

//reset password page
Route::get('/forgot', [PasswordResetController::class, 'create']);
Route::post('/forgotpass', [PasswordResetController::class, 'resetPassword']);

//get reset password token
Route::get('/reset/{reset_token}/{email}', [ResetPasswordController::class, 'showResetForm']);
Route::post('/updatepass', [ResetPasswordController::class, 'reset']);

//edit profile page
Route::get('/editprofile', [ProfileController::class, 'index']);
Route::post('/updateprofile', [ProfileController::class, 'update']);

//admin page
Route::get('/adminlogin', [AdminAuthController::class, 'showLoginForm']);
Route::get('/dashboard', [AdminAuthController::class, 'successlogin']);
Route::post('/adminlogin', [AdminAuthController::class, 'login']);
Route::post('/adminlogout', [AdminAuthController::class, 'logout']);

//xml
Route::get('/users.xml', [UserController::class, 'xml']);


//test email
//Route::get('/test-email', function () {
//    Mail::raw('This is a test email', function ($message) {
//        $message->to('tangch-wm20@student.tarc.edu.my');
//    });
//    return 'Test email sent';
//});
//
//Route::get('/test', function () {
//    Mail::to('tangch-wm20@student.tarc.edu.my')
//            ->send(new HelloMail());
//});

//Route::post('/register', function () {
//    dd('test'); //testing data
//});
