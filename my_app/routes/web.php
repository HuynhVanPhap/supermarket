<?php

use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\OrderController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\RootCategoryController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DownloadController;
use App\Http\Controllers\Store\ShoppingController;
use App\Http\Controllers\Store\PageController;
use App\Mail\OrderShipped;
use App\Models\Order;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Mail;

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

Route::get('/', [PageController::class, 'home'])->name('home.page');
Route::get('404', [PageController::class, 'notFound'])->name('not.found.page');

Route::get('config/cache', function () {
    Artisan::call('config:cache');
});

Route::get('/link', function () {
    app('files')->link(storage_path('app/public'), public_path('storage'));
});

Route::middleware('is.login')->group(function () {
    Route::get('login', [AuthController::class, 'loginPage'])->name('login.page');
    Route::post('login', [AuthController::class, 'login'])->name('login');
    Route::get('register', [AuthController::class, 'signUpPage'])->name('register.page');
    Route::post('register', [AuthController::class, 'signUp'])->name('register');
});

Route::get('cart', [PageController::class, 'cart'])->name('cart.page');

Route::get('send-mail', function () {
    $order = Order::find(4);
    return Mail::to($order->email)->send(new OrderShipped($order));
});

Route::middleware('has.cart')->group(function () {
    Route::get('customer-info', [PageController::class, 'customerInfo'])->name('customer.info.page');
    Route::post('customer-info', [ShoppingController::class, 'customerInfo'])->name('customer.info');
});

Route::middleware(['has.cart', 'has.customer'])->group(function () {
    Route::get('payment', [PageController::class, 'payment'])->name('payment.page');
    Route::post('payment', [ShoppingController::class, 'payment'])->name('payment');
});

Route::get('payment/success', [PageController::class, 'paymentSuccess'])->name('payment.success.page')->middleware('had.payment');
Route::get('search', [PageController::class, 'search'])->name('search.page');
Route::get('{slug}', [PageController::class, 'category'])->name('category.page');
Route::get('detail/{slug}', [PageController::class, 'detail'])->name('detail.page');
Route::post('add-cart', [ShoppingController::class, 'cart'])->name('shopping.cart');
Route::post('update-cart', [ShoppingController::class, 'updateCart'])->name('shopping.update.cart');
Route::post('remove-cart', [ShoppingController::class, 'removeCart'])->name('shopping.remove.cart');

Route::prefix('admin')->name('admin.')->middleware('had.login')->group(function () {
    Route::get('logout', [AuthController::class, 'logout'])->name('logout');

    Route::middleware('is.manager')->group(function () {
        Route::get('dashboard', [DashboardController::class, 'page'])->name('dashboard.page');
        Route::get('download/form/product', [DownloadController::class, 'productForm'])->name('download.form.product');
        Route::post('products/import', [ProductController::class, 'import'])->name('products.import');
        Route::get('products/export', [ProductController::class, 'export'])->name('products.export');
        Route::get('categories/trash', [CategoryController::class, 'trash'])->name('categories.trash');
        Route::get('root-categories/trash', [RootCategoryController::class, 'trash'])->name('root-categories.trash');
        Route::get('products/trash', [ProductController::class, 'trash'])->name('products.trash');
        Route::get('products/restore/{id}', [ProductController::class, 'restore'])->name('products.restore');
        Route::get('root-categories/restore/{id}', [RootCategoryController::class, 'restore'])->name('root-categories.restore');
        Route::get('categories/restore/{id}', [CategoryController::class, 'restore'])->name('categories.restore');
        Route::get('orders/confirm/{code}', [OrderController::class, 'confirm'])->name('orders.confirm');
        Route::post('products/clear/{id}', [ProductController::class, 'clear'])->name('products.clear');
        Route::post('root-categories/clear/{id}', [RootCategoryController::class, 'clear'])->name('root-categories.clear');
        Route::post('categories/clear/{id}', [CategoryController::class, 'clear'])->name('categories.clear');
        Route::post('users/change-password', [UserController::class, 'changePassword'])->name('users.change.password');
        Route::resource('categories', CategoryController::class);
        Route::resource('root-categories', RootCategoryController::class);
        Route::resource('products', ProductController::class);
        Route::resource('orders', OrderController::class)->except('show');
        Route::resource('users', UserController::class)->except('show');
        Route::post('change-display-status-category', [CategoryController::class, 'changeDisplayStatus'])->name('category.change.display.status');
        Route::post('change-display-status-root-category', [RootCategoryController::class, 'changeDisplayStatus'])->name('root-category.change.display.status');
        Route::post('change-display-status-product', [ProductController::class, 'changeDisplayStatus'])->name('product.change.display.status');
    });

    Route::get('list/orders/{email}', [OrderController::class, 'list'])->name('list.orders.page');
    Route::resource('users', UserController::class)->only('show');
    Route::resource('orders', OrderController::class)->only('show');

    Route::resource('detail-orders', DetailOrderController::class);
});
