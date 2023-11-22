<?php

use App\Http\Controllers\AkunController;
use App\Http\Controllers\MobilController;
use App\Http\Controllers\PenyewaanController;
use App\Http\Controllers\DetailSewaController;
use App\Http\Controllers\PengembalianController;
use App\Models\DetailSewa;
use App\Models\Mobil;
use App\Models\Pengembalian;
use App\Models\Penyewaan;
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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::prefix('login')->group(function () {
    Route::get('/', [AkunController::class, 'index'])->name('login');
    Route::post('/', [AkunController::class, 'login'])->name('proseslogin');
});

Route::middleware(['auth'])->group(function () {
    Route::prefix('mobil')
        ->middleware(['akses:superadmin'])
        ->group(function () {
            Route::get('/', [MobilController::class, 'index'])->name('dataMobil');
            Route::get('/detail/{id}', [MobilController::class, 'detail']);
            Route::get('/unduh', [MobilController::class, 'unduh']);
            Route::get('/tambah', [MobilController::class, 'create'])->name('tambahMobil');
            Route::post('/simpan', [MobilController::class, 'store'])->name('simpanMobil');
            Route::get('/edit/{id}', [MobilController::class, 'edit'])->name('editMobil');
            Route::post('/edit/simpan', [MobilController::class, 'update'])->name('simpanEditMobil');
            Route::delete('/hapus', [MobilController::class, 'destroy'])->name('hapusMobil');
        });
    Route::prefix('detail')
        ->middleware(['akses:superadmin'])
        ->group(function () {
            Route::get('/', [DetailSewaController::class, 'index'])->name('dataDetail');
            Route::get('/detail/{id}', [DetailSewaController::class, 'detail']);
            Route::get('/tambah', [DetailSewaController::class, 'create'])->name('tambahDetail');
            Route::post('/simpan', [DetailSewaController::class, 'store'])->name('simpanDetail');
            Route::get('/edit/{id}', [DetailSewaController::class, 'edit'])->name('editDetail');
            Route::post('/edit/simpan', [DetailSewaController::class, 'update'])->name('simpanEditDetail');
            Route::delete('/hapus', [DetailSewaController::class, 'destroy'])->name('hapusDetail');
        });

    Route::prefix('penyewaan')
        ->middleware(['akses:admin,superadmin'])
        ->group(function () {
            Route::get('/', [PenyewaanController::class, 'index'])->name('dataPenyewaan');
            Route::get('/detail/{id}', [PenyewaanController::class, 'detail']);
            Route::get('/tambah', [PenyewaanController::class, 'create'])->name('tambahPenyewaan');
            Route::post('/simpan', [PenyewaanController::class, 'store'])->name('simpanPenyewaan');
            Route::get('/edit/{id}', [PenyewaanController::class, 'edit'])->name('editPenyewaan');
            Route::post('/edit/update', [PenyewaanController::class, 'update'])->name('simpanEditPenyewaan');
            Route::delete('/hapus', [PenyewaanController::class, 'destroy'])->name('hapusPenyewaan');
        });

    Route::prefix('pengembalian')
        ->middleware(['akses:admin,superadmin'])
        ->group(function () {
            Route::get('/', [PengembalianController::class, 'index'])->name('dataPengembalian');
            Route::get('/tambah', [PengembalianController::class, 'create'])->name('tambahPengembalian');
            Route::post('/simpan', [PengembalianController::class, 'store'])->name('simpanPengembalian');
            Route::get('/edit{id}', [PengembalianController::class, 'edit'])->name('editPengembalian');
            Route::post('/edit/simpan', [PengembalianController::class, 'update'])->name('simpanEditPengembalian');
            Route::delete('/hapus', [PengembalianController::class, 'destroy'])->name('hapusPengembalian');
        });

    Route::get('/logout', [AkunController::class, 'logout']);
});
