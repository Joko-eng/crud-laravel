<?php

use App\Http\Controllers\ProdukController;
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

Route::get('/produk', [ProdukController::class ,'index'])->name('produk');
Route::post('/produk', [ProdukController::class, 'store'])->name('produks.store');
Route::get('/create',[ProdukController::class, 'create'])->name('produks.create');
Route::post('/produk{produk}',[ProdukController::class, 'update'])->name('produks.update');
Route::delete('/produk{produk}',[ProdukController::class, 'destroy'])->name('produks.destroy');
Route::get('/produk{produk}/edit',[ProdukController::class, 'edit'])->name('produks.edit');

