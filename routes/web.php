<?php

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
    //Laporan
    Route::get('laporan',[LaporanController::class,'index'])->
    name('laporan');
    //Data Komputer
    Route::get('komputer',[DataKomputer::class,'index'])->
    name('komputer');
});


