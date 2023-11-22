<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\ClientOrderController;
use App\Http\Controllers\FoodController;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\OrderController;
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
    return redirect()->route('menu.index');
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::resource('/foods', FoodController::class);

    Route::get('/menu', [MenuController::class, 'index'])->name('menu.index');
    Route::post('/menu/select', [MenuController::class, 'selectFood'])->name('menu.select');
    Route::post('/menu/update', [MenuController::class, 'updateFood'])->name('menu.update');
    Route::post('/menu/remove', [MenuController::class, 'removeFood'])->name('menu.remove');

    Route::get('/orders', [OrderController::class, 'index'])->name('admin.order.index');

    Route::resource('/admins', AdminController::class)->only(['index', 'create', 'edit', 'store', 'update', 'destroy']);

    Route::prefix('/client/orders')->group(function() {
        Route::get('/', [ClientOrderController::class, 'index'])->name('client.order.index');
        Route::post('/', [ClientOrderController::class, 'store'])->name('client.order.store');
    });
});

require __DIR__.'/auth.php';
