<?php

use App\Http\Controllers\DatastokController;
use App\Http\Controllers\DesignController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\KeuanganController;
use App\Http\Controllers\KlienController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\OrderanController;
use App\Http\Controllers\ProdukController;
use App\Http\Controllers\StokController;
use Illuminate\Support\Facades\Auth;
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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [HomeController::class, 'index'])->name('home');


Route::group(['middleware' => ['auth']], function () {

    Route::resource('/order', OrderController::class);
    Route::resource('/klien', KlienController::class);
    Route::resource('/produk', ProdukController::class);
    Route::resource('/orderan', OrderanController::class);
    Route::resource('/keuangan', KeuanganController::class);
    Route::resource('/design', DesignController::class);
    Route::resource('/stok', StokController::class);
    Route::resource('/datastok', DatastokController::class);

    Route::get('/nota/{id}', [HomeController::class, 'nota']);
    Route::get('/tambah/{id}', [HomeController::class, 'tambah']);
    Route::get('/list/produk/{id}',[HomeController::class, 'listproduk']);
    Route::post('/tambahproduk',[HomeController::class, 'tambahproduk'])->name('tambahproduk');

    Route::get('/d/produk/id/{orderanid}',[OrderanController::class, 'destroyall'])->name('hapus.semuaproduk');
    

});
