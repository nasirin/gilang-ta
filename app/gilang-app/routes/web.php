<?php

use App\Http\Controllers\AuditController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\BarangController;
use App\Http\Controllers\DistributorController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\LaporanController;
use App\Http\Controllers\ProdukController;
use App\Http\Controllers\StockInController;
use App\Http\Controllers\TransaksiController;
use App\Http\Controllers\BasketController;
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

Route::group(['middleware' => 'loged'], function () {
    Route::get('/', [HomeController::class, 'index']);
    Route::resource('employee', EmployeeController::class);
    Route::resource('kategori', KategoriController::class);
    Route::resource('distributor', DistributorController::class);
    Route::resource('barang', BarangController::class);
    Route::resource('stockin', StockInController::class);
    Route::resource('produk', ProdukController::class);
    Route::resource('audit', AuditController::class);
    Route::resource('transaksi', TransaksiController::class);
    Route::resource('basket', BasketController::class);
    Route::post('laporan', [LaporanController::class, 'store']);
    Route::get('laporan', [LaporanController::class, 'LaporanLabaKotor']);
    // Route::get('laporan/laba', [LaporanController::class, 'LaporanLabaKotor']);
});
Route::get('login', [AuthController::class, 'index'])->middleware('already_loged');
Route::get('signout', [AuthController::class, 'signout']);
Route::post('login', [AuthController::class, 'login']);
