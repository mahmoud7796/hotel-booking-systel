<?php

use App\Http\Controllers\Admin\Auth\LoginController;
use App\Http\Controllers\Admin\BannerController;
use App\Http\Controllers\Admin\CustomerController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\LocationController;
use App\Http\Controllers\Admin\RoomController;
use App\Http\Controllers\Admin\RoomTypeController;
use App\Http\Controllers\Admin\BookingController;
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
Route::group(['middleware'=>'guest:admin','prefix'=>'admin'], function(){
    Route::get('/login', [loginController::class,'login'])->name('admin.login');
    Route::post('/post-login', [LoginController::class,'postLogin'])->name('admin.postLogin');
    Route::get('/forget-password', [LoginController::class,'forgetPassword'])->name('admin.forgetPassword');
});
############### End Login ####################


############### Admin Dashboard ####################
Route::group(['middleware' => 'auth:admin','prefix'=>'admin'], function(){
    Route::get('/dashboard', [dashboardController::class,'index'])->name('admin.dashboard');
    Route::get('/logout', [LoginController::class,'logout'])->name('admin.logout');
    });
############### End Admin Dashboard ####################

############### Home Banner ####################
Route::group(['middleware' => 'auth:admin','prefix'=>'admin/banner'], function(){
    Route::get('index',[BannerController::class,'index'])->name('admin.banner');
    Route::get('create',[BannerController::class,'create'])->name('admin.banner.create');
    Route::post('store',[BannerController::class,'store'])->name('admin.banner.store');
    Route::get('edit/{id}',[BannerController::class,'edit'])->name('admin.banner.edit');
    Route::post('update/{id}',[BannerController::class,'update'])->name('admin.banner.update');
    Route::get('delete/{id}',[BannerController::class,'delete'])->name('admin.banner.delete');
});
############### End Home Banner ####################


###############  location ####################
Route::group(['middleware' => 'auth:admin','prefix'=>'admin/location'], function(){
    Route::get('index',[LocationController::class,'index'])->name('admin.location');
    Route::get('create',[LocationController::class,'create'])->name('admin.location.create');
    Route::post('store',[LocationController::class,'store'])->name('admin.location.store');
    Route::get('edit/{id}',[LocationController::class,'edit'])->name('admin.location.edit');
    Route::post('update/{id}',[LocationController::class,'update'])->name('admin.location.update');
    Route::get('delete/{id}',[LocationController::class,'delete'])->name('admin.location.delete');
});
############### End  location ####################


###############  RoomType ####################
Route::group(['middleware' => 'auth:admin','prefix'=>'admin/room-type'], function(){
    Route::get('index',[RoomTypeController::class,'index'])->name('admin.roomType');
    Route::get('show/{id}',[RoomTypeController::class,'show'])->name('admin.roomType.show');
    Route::get('create',[RoomTypeController::class,'create'])->name('admin.roomType.create');
    Route::post('store',[RoomTypeController::class,'store'])->name('admin.roomType.store');
    Route::get('edit/{id}',[RoomTypeController::class,'edit'])->name('admin.roomType.edit');
    Route::post('update/{id}',[RoomTypeController::class,'update'])->name('admin.roomType.update');
    Route::get('delete/{id}',[RoomTypeController::class,'delete'])->name('admin.roomType.delete');
    Route::get('destroy-img/{id}',[RoomTypeController::class,'destroyImage'])->name('admin.roomType.destroyImage');

});
############### End RoomType ####################


###############  Rooms ####################
Route::group(['middleware' => 'auth:admin','prefix'=>'admin/rooms'], function(){
    Route::get('index',[RoomController::class,'index'])->name('admin.room');
    Route::get('create',[RoomController::class,'create'])->name('admin.room.create');
    Route::post('store',[RoomController::class,'store'])->name('admin.room.store');
    Route::get('edit/{id}',[RoomController::class,'edit'])->name('admin.room.edit');
    Route::post('update/{id}',[RoomController::class,'update'])->name('admin.room.update');
    Route::get('delete/{id}',[RoomController::class,'delete'])->name('admin.room.delete');
});
############### End Rooms ####################


###############  Customers ####################
Route::group(['middleware' => 'auth:admin','prefix'=>'admin/customer'], function(){
    Route::get('index',[CustomerController::class,'index'])->name('admin.customer');
    Route::get('create',[CustomerController::class,'create'])->name('admin.customer.create');
    Route::post('store',[CustomerController::class,'store'])->name('admin.customer.store');
    Route::get('edit/{id}',[CustomerController::class,'edit'])->name('admin.customer.edit');
    Route::post('update/{id}',[CustomerController::class,'update'])->name('admin.customer.update');
    Route::get('delete/{id}',[CustomerController::class,'delete'])->name('admin.customer.delete');
});
############### End Customers ####################


###############  booking ####################
Route::group(['middleware' => 'auth:admin','prefix'=>'admin/booking'], function(){
    Route::get('index',[BookingController::class,'index'])->name('admin.booking');
    Route::get('create',[BookingController::class,'create'])->name('admin.booking.create');
    Route::post('store',[BookingController::class,'store'])->name('admin.booking.store');
    Route::get('delete/{id}',[BookingController::class,'delete'])->name('admin.booking.delete');
    Route::get('available-rooms/{checkin_date}',[BookingController::class,'availableRooms']);
});
############### End booking ####################
