<?php

use App\Http\Controllers\BeratController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DestinationsController;
use App\Http\Controllers\DropPointsController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\KusirsController;
use App\Http\Controllers\OrdersController;
use Illuminate\Support\Facades\Auth;

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

Route::get('/', [DashboardController::class, 'index']);
Route::get('/about', [DashboardController::class, 'about']);
// Route::get('/destination', [DashboardController::class, 'destination']);
// Route::get('/detail', [DashboardController::class, 'destination']);
Route::get('/drop_point', [DashboardController::class, 'drop_point']);
Route::get('/search', [DashboardController::class, 'search'])->name('search');

// Route::get('/get-drop-points/{id}', [DashboardController::class, 'getDropPoints']);
Route::get('/get-drop-point/', [DashboardController::class, 'getDropPoint']);
Route::get('/get-kusirs/', [DashboardController::class, 'getKusirs']);
Route::get('/get-berat/', [DashboardController::class, 'getBerat']);
Route::post('/orders/{order}/complete', [OrderController::class, 'complete'])->name('orders.complete');


Auth::routes();
Route::group(['middleware' => ['auth']], function () {
    Route::middleware('role.admin')->group(function() {
        Route::get('/admin/dashboard', [DashboardController::class, 'admin'])->name('admin.dashboard');
        Route::prefix('berats/')->name('berats.')->group(function () {
            Route::get('/', [BeratController::class, 'index'])->name('index');
            Route::get('/create', [BeratController::class, 'create'])->name('create');
            Route::get('/edit/{id}', [BeratController::class, 'edit'])->name('edit');
            Route::post('/store', [BeratController::class, 'store'])->name('store');
            Route::post('/update/{id}', [BeratController::class, 'update'])->name('update');
            Route::delete('/berats/destroy/{berat}', [BeratController::class, 'destroy'])->name('destroy');
        });
        Route::prefix('/admin/destinations/')->name('destinations.')->group(function () {
            Route::get('/', [DestinationsController::class, 'index'])->name('index');
            Route::get('/create', [DestinationsController::class, 'create'])->name('create');
            Route::get('/edit/{id}', [DestinationsController::class, 'edit'])->name('edit');
            Route::post('/store', [DestinationsController::class, 'store'])->name('store');
            Route::post('/update/{id}', [DestinationsController::class, 'update'])->name('update');
            Route::delete('/destinations/destroy/{destination}', [DestinationsController::class, 'destroy'])->name('destroy');
        });
        Route::prefix('/admin/drop_points/')->name('drop_points.')->group(function () {
            Route::get('/', [DropPointsController::class, 'index'])->name('index');
            Route::get('/create', [DropPointsController::class, 'create'])->name('create');
            Route::get('/edit/{id}', [DropPointsController::class, 'edit'])->name('edit');
            Route::post('/store', [DropPointsController::class, 'store'])->name('store');
            Route::post('/update/{id}', [DropPointsController::class, 'update'])->name('update');
            Route::delete('/drop_points/destroy/{drop_point}', [DropPointsController::class, 'destroy'])->name('destroy');
        });
        
        Route::prefix('/admin/kusirs/')->name('kusirs.')->group(function () {
            Route::get('/', [KusirsController::class, 'index'])->name('index');
            Route::get('/create', [KusirsController::class, 'create'])->name('create');
            Route::get('/edit/{id}', [KusirsController::class, 'edit'])->name('edit');
            Route::post('/store', [KusirsController::class, 'store'])->name('store');
            Route::post('update/{id}', [KusirsController::class, 'update'])->name('update');
            Route::delete('/kusirs/destroy/{kusir}', [KusirsController::class, 'destroy'])->name('destroy');
        });
        Route::prefix('/admin/orders/')->name('orders.')->group(function () {
            Route::get('/', [OrdersController::class, 'index'])->name('admin.index');
            Route::get('/create', [OrdersController::class, 'create'])->name('admin.create');
            Route::get('/edit/{id}', [OrdersController::class, 'edit'])->name('admin.edit');
            Route::post('/store', [OrdersController::class, 'store'])->name('store');
            Route::post('update/{id}', [OrdersController::class, 'update'])->name('admin.update');
            Route::delete('/destroy/{order}', [OrdersController::class, 'destroy'])->name('admin.destroy');
        });
    });

    Route::middleware('role.kusir')->group(function() {
        Route::get('/kusir/dashboard', [DashboardController::class, 'kusir'])->name('kusir.dashboard');
        Route::get('/show-orders/', [DashboardController::class, 'showOrders'])->name('showOrders');
        Route::get('/kusir/{id}/orders', [DashboardController::class, 'allOrders'])->name('allOrders');
        Route::post('/kusir/notifications/auth', [DashboardController::class, 'listenForOrderNotifications']);
        Route::post('/orders/{order}/complete', [OrdersController::class, 'complete']);
    });

    Route::middleware('role.user')->group(function() {
        Route::get('/user/dashboard', [DashboardController::class, 'user'])->name('user.dashboard');
        Route::prefix('user/orders/')->name('orders.')->group(function () {
            Route::get('/', [OrdersController::class, 'index'])->name('user.index');
            Route::get('/create', [OrdersController::class, 'create'])->name('user.create');
            Route::post('/store', [OrdersController::class, 'store'])->name('store');
            
        });
    });


});

Route::prefix('destination/')->name('destination.')->group(function () {
    Route::get('/', [DashboardController::class, 'destination'])->name('destination');
    Route::get('/detail-destination/{slug}', [DashboardController::class, 'detail_destination'])->name('detail_destination');
});

