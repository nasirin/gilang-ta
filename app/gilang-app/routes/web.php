<?php

use App\Http\Controllers\BarangController;
use App\Http\Controllers\DistributorController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\KategoriController;
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

Route::get('/', [HomeController::class, 'index']);
Route::resource('employee', EmployeeController::class);
Route::resource('kategori', KategoriController::class);
Route::resource('distributor', DistributorController::class);
Route::resource('barang', BarangController::class);
