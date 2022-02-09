<?php

use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\EventController;
use App\Http\Controllers\HomeController as ControllersHomeController;
use App\Http\Controllers\ShopController;
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
Route::get('/shop', [ShopController::class, 'shop'])->name('shop');
Route::get('/cart', [ShopController::class, 'cart'])->name('cart');
Route::get('/earnings', [HomeController::class, 'earnings'])->name('earnings');



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
});

require __DIR__.'/auth.php';
