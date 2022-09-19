<?php

use App\Http\Controllers\Admin\AdminDashboardController;
use App\Http\Controllers\Admin\OrderController;
use App\Http\Controllers\SearchController;
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

// admin routes
Route::get('/admin/dashboard', [AdminDashboardController::class, 'index'])->name('admin.dashboard');
Route::get('/admin/orders', [OrderController::class, 'index'])->name('orders');
Route::get('/admin/add-order', [OrderController::class, 'create'])->name('add-order');
Route::post('/admin/orders/add', [OrderController::class, 'store'])->name('store-order');
Route::get('/admin/profile', [AdminDashboardController::class, 'profile'])->name('profile');

Route::get('search', [OrderController::class, 'search'])->name('search');
Route::get('date-search', [OrderController::class, 'dateSearch'])->name('date-search');
