<?php

use App\Http\Livewire\Admin\Client;
use App\Http\Livewire\Admin\Orders;
use App\Http\Livewire\CreateClient;
use App\Http\Livewire\Admin\Clients;
use App\Http\Livewire\Admin\Contacts;
use App\Http\Livewire\Admin\NewOrder;
use Illuminate\Support\Facades\Route;
use App\Http\Livewire\Admin\AddClient;
use App\Http\Livewire\Admin\EditOrder;
use App\Http\Livewire\Admin\NewRecord;
use App\Http\Livewire\Admin\OrderList;
use App\Http\Livewire\Admin\EditClient;
use App\Http\Livewire\Admin\ShowOrders;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use App\Http\Livewire\Admin\CreateOrder;
use App\Http\Livewire\Admin\EditProduct;
use App\Http\Livewire\ProductCategories;
use App\Http\Livewire\AddProductCategory;
use App\Http\Livewire\Admin\Measurements;
use App\Http\Livewire\Admin\OrderDetails;
use App\Http\Livewire\Admin\ClientDetails;
use App\Http\Controllers\ProfileController;
use App\Http\Livewire\Admin\DeletedRecords;
use App\Http\Controllers\Admin\OrderController;
use App\Http\Controllers\Admin\OrdersController;
use App\Http\Controllers\Admin\AdminDashboardController;
use App\Http\Controllers\PurchaseOrderController;
use App\Http\Controllers\PurchaseOrderItemController;
use App\Http\Livewire\Admin\AddMeasurement;
use App\Http\Livewire\Admin\EditMeasurements;
use App\Http\Livewire\Admin\ModifyOrder;

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
    Route::get('/clients/edit/{client_id}', EditClient::class)->name('edit-client');
    Route::get('/orders-clients', OrderList::class)->name('client-orders');

    Route::get('/orders', OrderList::class)->name('orders');
    Route::get('/orders/details/{order}', [OrdersController::class, 'show'])->name('orders.show');
    Route::get('/clients/{client}/orders', [OrdersController::class, 'showClientOrders'])->name('clients.orders');

    Route::get('/measure/add', AddMeasurement::class)->name('add-measurement');
    Route::get('/measurements', Measurements::class)->name('measurements');
    Route::get('/measurement/{measurement_id}', EditMeasurements::class)->name('edit-measurement');

    Route::post('/orders/add', [OrderController::class, 'store'])->name('store-order');
    Route::get('/new-record', NewRecord::class)->name('add-record');
    // Route::get('/order/{order_id}', ModifyOrder::class)->name('modify-order');

    Route::get('/orders', Orders::class)->name('orders');
    // Route::get('/add-order', NewOrder::class)->name('add-order');
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
    Route::get('/user/profile', [ProfileController::class, 'index'])->name('admin-profile');

    Route::get('/products', ProductCategories::class)->name('product-categories');
    Route::get('/products/add', AddProductCategory::class)->name('add-product');
    Route::get('/product/{product_code}', EditProduct::class)->name('edit-product');

    Route::get('/contacts', Contacts::class)->name('contacts');
    Route::get('/deleted-records', DeletedRecords::class, 'deletedRecords')->name('deleted-records');

    Route::resource('purchase_orders', PurchaseOrderController::class)->name('index', 'purchase_orders');
    Route::delete('purchase_orders/{purchase_order}', [PurchaseOrderController::class, 'destroy'])->name('purchase_orders.destroy');

    Route::post('purchase_orders/{purchase_order}/items', [PurchaseOrderItemController::class, 'store'])->name('purchase_orders.items.store');
    Route::get('/purchase_orders/{purchase_order}/items/{id}/edit', [PurchaseOrderItemController::class, 'edit'])->name('purchase_order_items.edit');
    // Route::put('/purchase_orders/{purchase_order}/items/{id}', [PurchaseOrderItemController::class, 'update'])->name('purchase_orders.items.update');
    Route::put('/purchase_orders/{purchase_order}/items/purchase_order_item', [PurchaseOrderItemController::class, 'update'])->name('update-item');
    Route::delete('/purchase_orders/{purchase_order}/items/{purchase_order_item}', [PurchaseOrderItemController::class, 'destroy'])->name('purchase_orders.items.destroy');

    /* Route::get('/purchase-orders', [PurchaseOrderController::class, 'index'])->name('purchase-orders.index');
    Route::get('/purchase-orders/create', [PurchaseOrderController::class, 'create'])->name('purchase-orders.create');
    Route::post('/purchase-orders', [PurchaseOrderController::class, 'store'])->name('purchase-orders.store');
    Route::get('/purchase-orders/{purchase_order}', [PurchaseOrderController::class, 'show'])->name('purchase-orders.show');
    Route::get('/purchase-orders/{purchase_order}/edit', [PurchaseOrderController::class, 'edit'])->name('purchase-orders.edit');
    Route::put('/purchase-orders/{purchase_order}', [PurchaseOrderController::class, 'update'])->name('purchase-orders.update');
    Route::delete('/purchase-orders/{purchase_order}', [PurchaseOrderController::class, 'destroy'])->name('purchase-orders.destroy');

    Route::get('/purchase-orders/{purchase_order}/items', [PurchaseOrderItemController::class, 'index'])->name('order-items.index');
    Route::get('/purchase-orders/{purchase_order}/items/create', [PurchaseOrderItemController::class, 'create'])->name('order-items.create');
    Route::post('/purchase-orders/{purchase_order}/items', [PurchaseOrderItemController::class, 'store'])->name('order-items.store');
    Route::get('/purchase-orders/{purchase_order}/items/{orderItem}', [PurchaseOrderItemController::class, 'show'])->name('order-items.show');
    Route::get('/purchase-orders/{purchase_order}/items/{orderItem}/edit', [PurchaseOrderItemController::class, 'edit'])->name('order-items.edit');
    Route::put('/purchase-orders/{purchase_order}/items/{orderItem}', [PurchaseOrderItemController::class, 'update'])->name('order-items.update');
    Route::delete('/purchase-orders/{purchase_order}/items/{orderItem}', [PurchaseOrderItemController::class, 'destroy'])->name('order-items.destroy'); */
});

// user
Route::middleware(['auth'])->prefix('user')->group(function () {
    Route::get('/profile', [ProfileController::class, 'index'])->name('user.profile');
});
