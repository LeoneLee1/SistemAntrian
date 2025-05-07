<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\TujuanController;
use App\Http\Controllers\AntrianController;
use App\Http\Controllers\RiwayatController;
use App\Http\Controllers\DashboardController;

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

Route::get('/',[HomeController::class,'welcome'])->name('/');
Route::get('load-data',[HomeController::class,'loadData'])->name('load.data');
Route::get('ticket',[HomeController::class,'ticket'])->name('ticket');
Route::get('ambilAntrian/{name}',[HomeController::class,'ambilAntrian'])->name('ambilAntrian');

Route::get('login',[AuthController::class,'login'])->name('login');
Route::post('login/authenticate',[AuthController::class,'loginAuthenticate'])->name('login.authenticate');
Route::get('logout',[AuthController::class,'logout'])->name('logout');

Route::middleware(['admin','auth'])->group(function (){
    Route::get('admin',[DashboardController::class,'index'])->name('admin');

    // User Controller
    Route::get('user',[UserController::class,'index'])->name('user');
    Route::get('user/json',[UserController::class,'json'])->name('user.json');
    Route::get('user/create',[UserController::class,'create'])->name('user.create');
    Route::post('user/create/insert',[UserController::class,'insert'])->name('user.insert');
    Route::get('user/show/{id}',[UserController::class,'show'])->name('user.show');
    Route::get('user/edit/{id}',[UserController::class,'edit'])->name('user.edit');
    Route::post('user/edit/update/{id}',[UserController::class,'update'])->name('user.update');
    Route::delete('user/delete/{id}',[UserController::class,'delete'])->name('user.delete');
    
    
    // Tujuan Controller
    Route::get('tujuan',[TujuanController::class,'index'])->name('tujuan');
    Route::get('tujuan/json',[TujuanController::class,'json'])->name('tujuan.json');
    Route::get('tujuan/create',[TujuanController::class,'create'])->name('tujuan.create');
    Route::post('tujuan/create/insert',[TujuanController::class,'insert'])->name('tujuan.insert');
    Route::get('tujuan/show/{id}',[TujuanController::class,'show'])->name('tujuan.show');
    Route::get('tujuan/edit/{id}',[TujuanController::class,'edit'])->name('tujuan.edit');
    Route::post('tujuan/edit/update/{id}',[TujuanController::class,'update'])->name('tujuan.update');
    Route::delete('tujuan/delete/{id}',[TujuanController::class,'delete'])->name('tujuan.delete');
    
    // Riwayat Controller
    Route::get('antrian',[AntrianController::class,'index'])->name('antrian');
    Route::get('antrian/cetak/{name}',[AntrianController::class,'cetakAntrian'])->name('antrian.cetak');
    Route::get('antrian/selesai/{id}',[AntrianController::class,'selesai'])->name('antrian.selesai');
});


