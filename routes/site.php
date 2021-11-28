<?php

use App\Http\Controllers\Site\Auth\LoginController;
use App\Http\Controllers\Site\Auth\registerController;
use App\Http\Controllers\Site\BookingController;
use App\Http\Controllers\Site\HomeController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

############### Login ####################
Route::group(['middleware'=>'guest:customer'], function(){
    Route::get('/login', [LoginController::class,'login'])->name('site.login');
    Route::post('/post-login', [LoginController::class,'postLogin'])->name('site.postLogin');
    Route::get('/forget-password', [LoginController::class,'forgetPassword'])->name('site.forgetPassword');
});
Route::get('/register', [registerController::class,'register'])->name('site.register');
Route::post('/register-store', [registerController::class,'store'])->name('site.register.store');
Route::get('/forget-password', [registerController::class,'forgetPassword'])->name('site.forgetPassword');
############### End Login ####################


############### pages ####################
Route::get('/', [HomeController::class,'home'])->name('site.home');
Route::get('/contact-us', [HomeController::class,'contactUs'])->name('site.contactUs');
Route::get('/about', [HomeController::class,'about'])->name('site.about');
Route::group(['middleware' => 'auth:customer'], function(){
    Route::get('/logout', [LoginController::class,'logout'])->name('site.logout');
    });
############### End  pages ####################


###############  booking ####################
Route::group(['middleware' => 'auth:customer'], function(){
    Route::post('store',[BookingController::class,'store'])->name('site.booking.store');
});
Route::get('site/booking/available-rooms/{checkin_date}',[BookingController::class,'availableRooms']);
Route::get('booking',[BookingController::class,'index'])->name('site.booking');

############### End booking ####################
