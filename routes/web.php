<?php

use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProfileController;

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

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');


//product Route
Route::get('/products', [ProductController::class, 'create'])->name('products.create');
Route::get('/products/create', [ProductController::class, 'index'])->name( 'products.index');
Route::post('/products', [ProductController::class, 'store'])->name('products.store');
Route::get('/products/{$id}/edit', [ProductController::class, 'edit'])->name('products.edit');
Route::post('/products/{$id}', [ProductController::class, 'update'])->name('products.update');
Route::delete('/products/{$id}', [ProductController::class, 'destroy'])->name('products.destroy');







});

require __DIR__.'/auth.php';