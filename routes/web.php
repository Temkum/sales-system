<?php

use App\Http\Livewire\Admin\ShowOrders;
use App\Http\Livewire\Admin\CreateOrder;
use App\Http\Livewire\Admin\Orders;
use App\Http\Livewire\Admin\Clients;
use App\Http\Livewire\Admin\Contacts;
use App\Http\Livewire\Admin\NewOrder;
use Illuminate\Support\Facades\Route;
use App\Http\Livewire\Admin\EditOrder;
use App\Http\Livewire\Admin\NewRecord;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use App\Http\Livewire\Admin\EditProduct;
use App\Http\Livewire\ProductCategories;
use App\Http\Livewire\AddProductCategory;
use App\Http\Livewire\Admin\OrderDetails;
use App\Http\Controllers\ProfileController;
use App\Http\Livewire\Admin\DeletedRecords;
use App\Http\Controllers\Admin\OrderController;
use App\Http\Controllers\Admin\AdminDashboardController;
use App\Http\Livewire\Admin\AddClient;
use App\Http\Livewire\Admin\Client;
use App\Http\Livewire\Admin\ClientDetails;
use App\Http\Livewire\Admin\EditClient;
use App\Http\Livewire\Admin\Measurements;
use App\Http\Livewire\CreateClient;

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

Route::controller(HomeController::class)->group(function () {
    Route::get('/', 'index')->name('home');
    Route::get('/shop', 'shop')->name('shop');
    Route::get('/about', 'about')->name('about');
    Route::get('/contact', 'contact')->name('contact');
});

// admin routes
Route::middleware(['auth', 'verified'])->prefix('admin')->group(function () {
    Route::get('/dashboard', [AdminDashboardController::class, 'index'])->name('admin.dashboard');

    Route::get('/clients', Clients::class)->name('clients');
    Route::get('/clients/add', AddClient::class)->name('add-client');
    Route::get('/clients/{client_id}', ClientDetails::class)->name('client-details');
    Route::get('/client/edit/{client_id}', EditClient::class)->name('edit-client');

    Route::get('/measure/add', Measurements::class)->name('add-measurement');

    Route::post('/orders/add', [OrderController::class, 'store'])->name('store-order');
    Route::get('/new-record', NewRecord::class)->name('add-record');

    Route::get('/orders', Orders::class)->name('orders');
    Route::get('/add-order', NewOrder::class)->name('add-order');
    Route::get('/orders/{order_id}', OrderDetails::class)->name('order-details');
    Route::get('/order/{order_id}', EditOrder::class)->name('update');

    Route::get('search', [OrderController::class, 'search'])->name('search');
    Route::get('date-search', [OrderController::class, 'dateSearch'])->name('date-search');

    Route::get('/users/', [UserController::class, 'index'])->name('users');
    Route::get('/add-user', [UserController::class, 'create'])->name('add-user');
    Route::post('/users/store', [UserController::class, 'store'])->name('save-user');
    Route::get('/user/edit/{id}', [UserController::class, 'edit'])->name('edit-user');
    Route::patch('/user/{id}', [UserController::class, 'update'])->name('update-user');
    Route::delete('/users/remove/{id}', [UserController::class, 'destroy'])->name('delete-user');
    Route::get('/user/profile', [ProfileController::class, 'index'])->name('profile');

    Route::get('/products', ProductCategories::class)->name('product-categories');
    Route::get('/products/add', AddProductCategory::class)->name('add-product');
    Route::get('/product/{product_code}', EditProduct::class)->name('edit-product');

    Route::get('/contacts', Contacts::class)->name('contacts');
    Route::get('/deleted-records', DeletedRecords::class, 'deletedRecords')->name('deleted-records');
});

// user
Route::middleware(['auth'])->prefix('user')->group(function () {
    Route::get('/profile', [ProfileController::class, 'index'])->name('profile');
});
