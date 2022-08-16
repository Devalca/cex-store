<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Admin\{DashboardController, GamesController};

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

Route::middleware(['auth','admin'])->group(function() 
    {
        Route::get('dashboard', DashboardController::class)->name('admin-dashboard');

        Route::prefix('games')->group(function(){
            Route::get('create', [GamesController::class, 'create'])->name('games.create');
            Route::post('create', [GamesController::class, 'store']);

            Route::get('listgame', [GamesController::class, 'listgame'])->name('games.listgame');

            Route::get('{game:id}/edit', [GamesController::class, 'edit'])->name('games.edit');
            Route::put('{game:id}/edit', [GamesController::class, 'update']);

            Route::delete('{game:id}', [GamesController::class, 'destroy'])->name('games.destroy');
        });
    });
