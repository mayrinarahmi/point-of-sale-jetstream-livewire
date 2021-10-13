<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TransaksiController;
use App\Http\Controllers\ChartController;
use App\Http\Controllers\LaporanController;
use App\Http\Controllers\DataTransaksiController;


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

Route::get('/', function () {
    return view('welcome');
});

// Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
//     return view('dashboard');
// })->name('dashboard');

Route::group(['middleware' =>['auth:sanctum', 'verified']], function () {

    Route::view('/dashboard', 'dashboard')->name('dashboard');
    Route::get('/transaksi', [TransaksiController::class, 'index'])->name('transaksi');
    Route::get('/struk/{no_order}', [TransaksiController::class, 'struk'])->name('struk');
  
    //chart
    Route::get('/charts', [ChartController::class, 'index'])->name('charts');

    Route::get('/laporan', [LaporanController::class, 'index'])->name('laporan');
    Route::get('/laporan/printproduk', [LaporanController::class, 'printproduk']);
    Route::post('/laporan/searchtanggal', [LaporanController::class, 'searchtanggal']);

    Route::get('/datatransaksi', [DataTransaksiController::class, 'index'])->name('datatransaksi');
    Route::get('/datatransaksi/printtransaksi', [DataTransaksiController::class, 'printtransaksi']);
    Route::post('/datatransaksi/searchtanggal', [DataTransaksiController::class, 'searchtanggal']);

});