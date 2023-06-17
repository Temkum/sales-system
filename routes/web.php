<?php

use App\Http\Livewire\Admin\Orders;
use App\Http\Livewire\Admin\Contacts;
use App\Http\Livewire\Admin\NewOrder;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Livewire\Admin\EditProduct;
use App\Http\Livewire\Admin\NewAddOrder;
use App\Http\Livewire\ProductCategories;
use App\Http\Livewire\AddProductCategory;
use App\Http\Livewire\Admin\OrderDetails;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Admin\OrderController;
use App\Http\Controllers\Admin\AdminDashboardController;
use App\Http\Livewire\Admin\EditOrder;
use App\Http\Livewire\TasksComponent;
use App\Http\Livewire\User\UserDashboardComponent;

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
Route::middleware(['auth', 'verified', 'isAdmin'])->group(function () {
    Route::get('/admin/dashboard', [AdminDashboardController::class, 'index'])->name('admin.dashboard');

    Route::post('/admin/orders/add', [OrderController::class, 'store'])->name('store-order');

    Route::get('/admin/new-order', NewAddOrder::class)->name('new-sale');

    Route::get('/admin/orders', Orders::class)->name('orders');
    Route::get('/admin/add-order', NewOrder::class)->name('add-order');
    Route::get('/admin/orders/{order_id}', OrderDetails::class)->name('order-details');
    Route::get('/admin/order/{order_id}', EditOrder::class)->name('update');

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
    Route::get('/admin/products/add', AddProductCategory::class)->name('add-product');
    Route::get('/admin/product/{product_code}', EditProduct::class)->name('edit-product');

    Route::get('/admin/contacts', Contacts::class)->name('contacts');
});

// user
Route::middleware(['auth'])->group(function () {
    // Route::get('/user/dashboard', UserDashboardComponent::class)->name('user.dashboard');
    Route::get('/user/profile', [ProfileController::class, 'index'])->name('profile');
    // Route::get('/user/tasks', TasksComponent::class)->name('tasks');
});
