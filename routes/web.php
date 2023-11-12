<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
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



Route::get('/',[ProductController::class,'index'])->name('home');

Route::get('/market/{id}',[ProductController::class,'show'])->name('show');

// routes/web.php

Route::get('/dashboard/login', [AuthController::class, 'index'])->name('login')->middleware('guest');
Route::post('/dashboard/login', [AuthController::class, 'store'])->name('login.store')->middleware('guest');



Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::get('/dashboard/all-products', [DashboardController::class, 'all_products'])->name('dashboard.all-products');
    Route::post('/dashboard/all-products', [ProductController::class, 'addProduct'])->name('dashboard.add');
    Route::post('/dashboard/all-products/{id}', [ProductController::class,'deleteProduct'])->name('dashboard.delete');
    Route::get('/dashboard/offered-products', [DashboardController::class, 'offered_products'])->name('dashboard.offered-products');
    Route::post('/dashboard/offered-products', [ProductController::class, 'addOffer'])->name('dashboard.add.offer');
    Route::post('/dashboard/offered-products/{id}', [ProductController::class,'deleteProductOffer'])->name('dashboard.deleteProductOffer');
    // Logout route using POST method
    Route::post('/dashboard', [AuthController::class, 'logout'])->name('logout');
});

