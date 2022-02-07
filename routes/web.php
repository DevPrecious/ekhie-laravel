<?php

use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\EventController;
use App\Http\Controllers\HomeController as ControllersHomeController;
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
Route::get('/create', [UserEventController::class, 'index'])->name('user.create');
Route::get('/settings', [UserController::class, 'settings'])->name('user.settings');
Route::post('/setting', [UserController::class, 'savesettings'])->name('user.setting');
Route::get('/event/{id}', [ControllersHomeController::class, 'event'])->name('event');
Route::any('/store', [ControllersHomeController::class, 'store'])->name('store');
Route::any('/buy', [ControllersHomeController::class, 'buy'])->name('buy');
Route::any('/purchase', [ControllersHomeController::class, 'purchase'])->name('purchase');
Route::get('/order', [ControllersHomeController::class, 'order'])->name('order');



Route::middleware(['is_admin'])->group(function(){
    Route::get('admin/dashboard', [DashboardController::class, 'index'])->name('admin.home');
    Route::get('admin/create', [EventController::class, 'index'])->name('create');
});

require __DIR__.'/auth.php';
