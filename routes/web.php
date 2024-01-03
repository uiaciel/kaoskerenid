<?php

use App\Exports\KlienExport;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\DatastokController;
use App\Http\Controllers\DesignController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\KatalogController;
use App\Http\Controllers\KatalogprodukController;
use App\Http\Controllers\KeuanganController;
use App\Http\Controllers\KlienController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\OrderanController;
use App\Http\Controllers\ProdukController;
use App\Http\Controllers\StokController;
use App\Http\Controllers\ReportController;
use App\Http\Controllers\FrontendController;
use App\Http\Controllers\OrderanKatalogController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\TokoController;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/', [FrontendController::class, 'index'])->name('frontend.index');

Route::get('/katalog', [FrontendController::class, 'katalog'])->name('frontend.katalog');

Route::get('/s/{id}', [ReportController::class, 'status'])->name('statusinv');


Auth::routes([
    'register' => false, // Registration Routes...
    'reset' => false, // Password Reset Routes...
    'verify' => false, // Email Verification Routes...
]);


Route::group([
    'middleware' => ['auth'],
    'prefix' => 'admin'
], function () {

    Route::get('/home', [HomeController::class, 'index'])->name('home');

    Route::get('/klien/exports', [KlienController::class, 'exportklien']);

    Route::get('/produk/list', [ProdukController::class, 'list']);
    Route::get('/klien/export', [KlienController::class, 'export'])->name('klien.export');
    Route::get('/klien/exportlastmonth', [KlienController::class, 'exportklienlastmonth'])->name('klien.exportlastmonth');

    Route::resource('/order', OrderController::class);
    Route::resource('/katalog', KatalogController::class);
    Route::resource('/klien', KlienController::class);
    Route::resource('/produk', ProdukController::class);
    Route::resource('/orderan', OrderanController::class);
    Route::resource('/keuangan', KeuanganController::class);
    Route::resource('/design', DesignController::class);
    Route::resource('/stok', StokController::class);
    Route::resource('/datastok', DatastokController::class);
    Route::resource('/report', ReportController::class);
    Route::resource('/orderankatalog', OrderanKatalogController::class);

    Route::resource('/katalogproduk', KatalogprodukController::class);
    Route::resource('/blog', BlogController::class);

    Route::resource('/toko', TokoController::class);
    Route::resource('/project', ProjectController::class);

    // Route::get('/toko/create', [TokoController::class, 'create']);
    Route::get('/nota/{id}', [HomeController::class, 'nota']);
    Route::get('/tambah/{id}', [HomeController::class, 'tambah'])->name('tambah');
    Route::get('/tambahkatalog/{id}', [HomeController::class, 'tambahkatalog'])->name('tambahkatalog');
    Route::get('/transaksi/{id}', [TokoController::class, 'transaksi'])->name('transaksi');
    Route::get('/list/produk/{id}', [HomeController::class, 'listproduk'])->name('listproduk');
    Route::post('/tambahproduk', [HomeController::class, 'tambahproduk'])->name('tambahproduk');
    Route::post('/tambahpaket', [HomeController::class, 'tambahpaket'])->name('tambahpaket');
    Route::get('/belanja', [HomeController::class, 'belanja'])->name('belanja');
    Route::get('/klien/export/bulanini', [KlienController::class, 'bulanini']);
    Route::get('/d/produk/id/{orderanid}', [OrderanController::class, 'destroyall'])->name('hapus.semuaproduk');
    Route::post('/update/produk', [ProdukController::class, 'listupdate'])->name('updateproduk');
    Route::get('/d/design', [DesignController::class, 'destroyall'])->name('design.destroyall');
    Route::get('/eps', [DesignController::class, 'listeps'])->name('design.eps');

    Route::post('/upload/data', [BlogController::class, 'tinimyce'])->name('upload');
    Route::get('/delete/designs', [DesignController::class, 'deleteimages'])->name('deleteimages');
});

Route::get('/{slug}', [BlogController::class, 'show'])->name('blog.show');
Route::get('/n/{id}', [HomeController::class, 'nota']);
Route::get('/invoice/{id}', [FrontendController::class, 'invoice']);
