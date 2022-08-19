<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\{HomeController, DetailController, CheckoutController};
use App\Http\Controllers\Admin\{DashboardController, UserController, GamesController, TransactionController};
use App\Http\Controllers\Client\{DashboardClientController, DashboardTransactionController};


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

Auth::routes();

Route::get('/', HomeController::class)->name('home');
Route::get('detail/{game:id}', [DetailController::class, 'index'])->name('detail');
Route::post('payments/midtrans-notification', [CheckoutController::class, 'callback']);

Route::middleware(['auth', 'user'])->group(function() {
    Route::get('dashboard', [DashboardClientController::class, 'index'])->name('dashboard');
    Route::get('/dashboard/transactions/{id}', [DashboardTransactionController::class, 'details'])->name('dashboard-transaction-details');

    Route::post('/checkout', [CheckoutController::class, 'process'])->name('checkout');

});

Route::middleware(['auth','admin'])->group(function() 
    {
        Route::get('admin-dashboard', DashboardController::class)->name('admin-dashboard');

        Route::prefix('users')->group(function(){
            Route::get('listuser', [UserController::class, 'index'])->name('user.index');
            Route::get('create', [UserController::class, 'create'])->name('user.create');
            Route::post('create', [UserController::class, 'store']);
            Route::get('{user:id}/edit', [UserController::class, 'edit'])->name('user.edit');
            Route::put('{user:id}/edit', [UserController::class, 'update']);
            Route::delete('{user:id}', [UserController::class, 'destroy'])->name('user.destroy');
        });

        Route::prefix('games')->group(function(){
            Route::get('create', [GamesController::class, 'create'])->name('games.create');
            Route::post('create', [GamesController::class, 'store']);
            Route::get('listgame', [GamesController::class, 'listgame'])->name('games.listgame');
            Route::get('{game:id}/edit', [GamesController::class, 'edit'])->name('games.edit');
            Route::put('{game:id}/edit', [GamesController::class, 'update']);
            Route::delete('{game:id}', [GamesController::class, 'destroy'])->name('games.destroy');
        });

        Route::get('transaction', [TransactionController::class, 'index'])->name('transaction.index');
        Route::get('transaction/edit/{id}', [TransactionController::class, 'edit'])->name('transaction.edit');
        Route::put('transaction/edit/{id}', [TransactionController::class, 'update']);
        Route::delete('{transaction:id}', [TransactionController::class, 'destroy'])->name('transaction.destroy');
    });
