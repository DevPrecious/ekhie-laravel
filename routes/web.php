<?php

use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\EventController;
use App\Http\Controllers\HomeController as ControllersHomeController;
use App\Http\Controllers\ShopController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\User\EventController as UserEventController;
use App\Http\Controllers\User\HomeController;
use App\Http\Controllers\User\UserController;
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

Route::get('/', [ControllersHomeController::class, 'index'])->name('homepage');


Route::get('/dashboard', [HomeController::class, 'index'])->name('dashboard');
Route::get('/orders', [HomeController::class, 'orders'])->name('orders');
Route::get('/create', [UserEventController::class, 'index'])->name('create');
Route::get('/settings', [UserController::class, 'settings'])->name('user.settings');
Route::post('/setting', [UserController::class, 'savesettings'])->name('user.setting');
Route::get('/event/{id}', [ControllersHomeController::class, 'event'])->name('event');
Route::any('/store', [ControllersHomeController::class, 'store'])->name('store')->middleware('auth');
Route::any('/buy', [ControllersHomeController::class, 'buy'])->name('buy');
Route::any('/purchase', [ControllersHomeController::class, 'purchase'])->name('purchase');
Route::get('/order', [ControllersHomeController::class, 'order'])->name('order')->middleware('order_check');
Route::get('/details/{id}', [HomeController::class, 'details'])->name('details');
Route::get('/callback', [ControllersHomeController::class, 'callback'])->name('callback');
Route::post('/clear', [ControllersHomeController::class, 'clear'])->name('clear');
// Route::get('/shop', [ShopController::class, 'shop'])->name('shop');
Route::get('/store', [ShopController::class, 'shop'])->name('shop');
Route::get('/cart', [ShopController::class, 'cart'])->name('cart');
Route::get('/earnings', [HomeController::class, 'earnings'])->name('earnings');
Route::get('cart', [CartController::class, 'cartList'])->name('cart.list');
Route::post('cart', [CartController::class, 'addToCart'])->name('cart.store');
Route::post('update-cart', [CartController::class, 'updateCart'])->name('cart.update');
Route::post('remove', [CartController::class, 'removeCart'])->name('cart.remove');
Route::post('clear', [CartController::class, 'clearAllCart'])->name('cart.clear');
Route::post('/store/buy', [CartController::class, 'buy'])->name('store.buy');
Route::get('/shop/callback', [CartController::class, 'callback'])->name('shop.callback');



Route::middleware(['is_admin'])->group(function(){
    Route::get('admin/dashboard', [DashboardController::class, 'index'])->name('admin.home');
    Route::get('admin/events', [DashboardController::class, 'events'])->name('events');
    Route::get('admin/settings', [DashboardController::class, 'settings'])->name('admin.settings');
    Route::post('admin/setting', [DashboardController::class, 'savesettings'])->name('admin.setting');
    Route::get('admin/event/{id}', [DashboardController::class, 'event'])->name('admin.event');
    Route::get('admin/accept/{id}', [DashboardController::class, 'accept'])->name('admin.accept');
    Route::get('admin/reject/{id}', [DashboardController::class, 'reject'])->name('admin.reject');
    Route::get('admin/organizers', [DashboardController::class, 'organizers'])->name('admin.organizers');
    Route::get('admin/organizers/{id}', [DashboardController::class, 'delete'])->name('admin.delete');
    Route::get('admin/products', [DashboardController::class, 'products'])->name('admin.products');
    Route::get('admin/orders', [DashboardController::class, 'orders'])->name('admin.orders');
    Route::get('admin/earnings', [DashboardController::class, 'earnings'])->name('admin.earnings');
    Route::get('admin/shop', [DashboardController::class, 'shop'])->name('admin.shop');
    Route::post('admin/shop', [DashboardController::class, 'store'])->name('store.shop');
});

require __DIR__.'/auth.php';
