<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ProductController;
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
    Route::prefix('products')->name('products.')->group(function(){
        Route::get('/', [ProductController::class, 'index'] )->name('index');
        Route::get('/{id}/show', [ProductController::class, 'show'] )->name('show');
        Route::group(['middleware' => ['role:admin']], function () {
            Route::get('/create', [ProductController::class, 'create'] )->name('create');
            Route::get('/{id}/edit', [ProductController::class, 'edit'] )->name('edit');
            Route::get('/{id}/update', [ProductController::class, 'update'] )->name('update');
            Route::get('/{id}/delete', [ProductController::class, 'delete'] )->name('delete');
            Route::get('/store', [ProductController::class, 'store'] )->name('store');
        });
    });

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
