<?php

use App\Http\Livewire\Orders;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Admin\OrderController;
use App\Http\Controllers\Admin\AdminDashboardController;
use App\Http\Livewire\AddOrderComponent;
use App\Http\Livewire\ProductCategories;

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
Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/admin/dashboard', [AdminDashboardController::class, 'index'])->name('admin.dashboard');

    // Route::get('/admin/orders', [OrderController::class, 'index'])->name('orders');
    // Route::get('/admin/add-order', [OrderController::class, 'create'])->name('add-order');

    Route::get('/admin/orders', Orders::class)->name('orders');
    Route::get('/admin/add-order', AddOrderComponent::class)->name('add-order');
    Route::post('/admin/orders/add', [OrderController::class, 'store'])->name('store-order');

    Route::get('search', [OrderController::class, 'search'])->name('search');
    Route::get('date-search', [OrderController::class, 'dateSearch'])->name('date-search');

    Route::get('/admin/users/', [UserController::class, 'index'])->name('users');
    Route::get('/admin/add-user', [UserController::class, 'create'])->name('add-user');
    Route::post('/admin/users/store', [UserController::class, 'store'])->name('save-user');
    Route::get('/admin/user/edit/{id}', [UserController::class, 'edit'])->name('edit-user');
    Route::patch('/admin/user/{id}', [UserController::class, 'update'])->name('update-user');
    Route::delete('/admin/users/remove/{id}', [UserController::class, 'destroy'])->name('delete-user');
    Route::get('/user/profile', [ProfileController::class, 'index'])->name('profile');

    Route::get('/admin/products', ProductCategories::class)->name('product-categories');
});

// user
Route::middleware(['auth'])->group(function () {
    Route::get('/user/profile', [ProfileController::class, 'index'])->name('profile');
});