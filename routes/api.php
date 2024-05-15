<?php

use App\Http\Controllers\API\AuthController;
use App\Http\Controllers\API\ProductController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/
Route::post("register", [AuthController::class, "register"]);
Route::post("login", [AuthController::class, "login"]);
// Route untuk menampilkan daftar produk
Route::get('/products', [ProductController::class, 'index'])->name('products.index');
// Route untuk menampilkan formulir tambah produk
Route::get('/products/create', [ProductController::class, 'create'])->name('products.create');
// Route untuk menyimpan produk baru
Route::post('/products', [ProductController::class, 'store'])->name('products.store');
// Route untuk menampilkan detail produk berdasarkan ID
Route::get('/products/{id}/show', [ProductController::class, 'show'])->name('products.show');
// Route untuk menampilkan formulir edit produk berdasarkan ID
Route::get('/products/{id}/edit', [ProductController::class, 'edit'])->name('products.edit');
// Route untuk memperbarui produk berdasarkan ID
Route::put('/products/{id}', [ProductController::class, 'update'])->name('products.update');
// Route untuk menghapus produk berdasarkan ID
Route::delete('/products/{id}', [ProductController::class, 'destroy'])->name('products.destroy');

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
