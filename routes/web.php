<?php

use App\Http\Controllers\CustomerController;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\ProdukController;
use Illuminate\Support\Facades\Route;



Route::get('/', [CustomerController::class, 'index']);

Route::get('/customer', [CustomerController::class, 'index'])->name('customer.index');
Route::get('/customer/create', [CustomerController::class, 'create'])->name('customer.create');
Route::post('/customer/store', [CustomerController::class, 'store'])->name('customer.store');
Route::get('/customer/{customer}/edit', [CustomerController::class, 'edit'])->name('customer.edit');
Route::put('/customer/{customer}', [CustomerController::class, 'update'])->name('customer.update');
Route::delete('/customer/{customer}', [CustomerController::class, 'destroy'])->name('customer.destroy');

Route::get('produk/trash', [ProdukController::class, 'trash'])->name('produk.trash');
Route::put('produk/{produk}/restore', [ProdukController::class, 'restore'])->name('produk.restore')->withTrashed();

Route::resource('kategori', KategoriController::class);
Route::resource('produk', ProdukController::class);

