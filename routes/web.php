<?php

use App\Http\Controllers\AkunController;
use App\Http\Controllers\MobilController;
use App\Http\Controllers\PenyewaanController;
use App\Models\Mobil;
use Illuminate\Support\Facades\Route;

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

Route::prefix('login')->group(function () {
    Route::get('/', [AkunController::class, 'index'])->name('login');
    // Route::post('/', [AuthController::class, 'login']);
});

Route::prefix('mobil')->group(function(){
    Route::get('/',[MobilController::class,'index'])->name('dataMobil');
    Route::get('/tambah',[MobilController::class,'create'])->name('tambahMobil');
    Route::post('/simpan',[MobilController::class,'store'])->name('simpanMobil');
    Route::get('edit/(id)',[MobilController::class,'edit'])->name('editMobil');
    Route::post('/edit/simpan',[MobilController::class,'update'])->name('simpanEditMobil');
    Route::delete('/hapus',[MobilController::class,'destroy'])->name('hapusMobil');
});

Route::prefix('penyewaan')->group(function(){
    Route::get('/',[PenyewaanController::class,'index'])->name('dataPenyewaan');
    Route::post('/simpan',[PenyewaanController::class,'store'])->name('simpanPenyewaan');
    Route::get('/edit(id)',[PenyewaanController::class,'edit'])->name('editPenyewaan');
    Route::post('/edit/simpan',[PenyewaanController::class,'update'])->name('simpanEditPenyewaan');
    Route::delete('/hapus',[PenyewaanController::class,'destroy'])->name('hapusPenyewaan');

});
