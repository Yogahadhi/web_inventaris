<?php

use App\Http\Controllers\StockOpname;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DataKomputer;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\LaporanController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\StockOpnameController;

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
    //UserEdit
    Route::get('user/edit/{id}',[UserController::class,'edit'])->
    name('userEdit');
    //UserUpdate
    Route::post('user/update/{id}',[UserController::class,'update'])->
    name('userUpdate');
    //UserDelete
    Route::delete('user/destroy/{id}',[UserController::class,'destroy'])->
    name('userDestroy');
    //UserExcel
    Route::get('user/excel',[UserController::class,'excel'])->
    name('userExcel');
    //UserPDF
    Route::get('user/pdf',[UserController::class,'pdf'])->
    name('userPdf');

    //Laporan
    Route::get('laporan',[LaporanController::class,'index'])->
    name('laporan');
    //LaporanCreate
    Route::get('laporan/create',[LaporanController::class,'create'])->
    name('laporanCreate');
    //LaporanStore
    Route::post('laporan/store',[LaporanController::class,'store'])->
    name('laporanStore');
    //LaporanUpdate
    Route::get('laporan/edit/{id}',[LaporanController::class,'edit'])->
    name('laporanEdit');
    Route::post('laporan/update/{id}',[LaporanController::class,'update'])->
    name('laporanUpdate');
    //LaporanDelete
    Route::delete('laporan/destroy/{id}',[LaporanController::class,'destroy'])->
    name('laporanDestroy');
    //LaporanExcel
    Route::get('laporan/excel',[LaporanController::class,'excel'])->
    name('laporanExcel');
    //LaporanPDF
    Route::get('laporan/pdf',[LaporanController::class,'pdf'])->
    name('laporanPdf');

    //Data Komputer
    Route::get('komputer',[DataKomputer::class,'index'])->
    name('komputer');
    //KomputerCreate
    Route::get('komputer/create',[DataKomputer::class,'create'])->
    name('komputerCreate');
    //KomputerStore
    Route::post('komputer/store',[DataKomputer::class,'store'])->
    name('komputerStore');
    //KomputerEdit
    Route::get('komputer/edit/{id}',[DataKomputer::class,'edit'])->
    name('komputerEdit');
    //KomputerUpdate
    Route::post('komputer/update/{id}',[DataKomputer::class,'update'])->
    name('komputerUpdate');
    //KomputerDelete
    Route::delete('komputer/destroy/{id}',[DataKomputer::class,'destroy'])->
    name('komputerDestroy');
    //KomputerExcel
    Route::get('komputer/excel',[DataKomputer::class,'excel'])->
    name('komputerExcel');
    //KomputerPDF
    Route::get('komputer/pdf',[DataKomputer::class,'pdf'])->
    name('komputerPdf');

    //Stock Opname
    Route::get('stock-opname',[StockOpnameController::class,'index'])->
    name('stock-opname');
});


