<?php

use App\Http\Controllers\StockOpname;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DataKomputer;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\LaporanController;
use App\Http\Controllers\DashboardController;

Route::get('/', function () {
    return view('welcome');
})->
name('welcome');
;

//Login
Route::get('login',[AuthController::class,'login'])->
name('login');
Route::post('login',[AuthController::class,'loginProses'])->
name('loginProses');

//Logout
Route::get('logout',[AuthController::class,'logout'])->
name('logout');


Route::middleware('checkLogin')->group(function () {
    //Dashboard
    Route::get('dashboard',[DashboardController::class,'index'])->
    name('dashboard');

    //User
    Route::get('user',[UserController::class,'index'])->
    name('user');
    //UserCreate
    Route::get('user/create',[UserController::class,'create'])->
    name('userCreate');
    //UserStore
    Route::post('user/store',[UserController::class,'store'])->
    name('userStore');

    //Laporan
    Route::get('laporan',[LaporanController::class,'index'])->
    name('laporan');

    //Data Komputer
    Route::get('komputer',[DataKomputer::class,'index'])->
    name('komputer');

    //Stock Opname
    Route::get('stock-opname',[StockOpname::class,'index'])->
    name('stock-opname');
});


