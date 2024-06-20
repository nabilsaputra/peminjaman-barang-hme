<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ItemController;
use App\Http\Controllers\RentController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PublicController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\TransactionController;
use App\Http\Controllers\ClientController;

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

Route::get('/', [PublicController::class, 'index']);

Route::middleware('only_guest')->group(function(){
    Route::get('login', [AuthController::class, 'login'])->name('login');
    Route::post('login', [AuthController::class, 'authenticating']);
    Route::get('register', [AuthController::class, 'register']);
    Route::post('register', [AuthController::class, 'registerProcess']);
});

Route::middleware('auth')->group(function(){
    Route::get('logout', [AuthController::class, 'logout']);
    
    Route::get('profile', [UserController::class, 'profile'])->middleware('only_client');
    Route::get('item-rent', [ClientController::class, 'index'])->middleware('only_client');
    Route::post('item-rent', [ClientController::class, 'store'])->middleware('only_client');

    Route::middleware('only_admin')->group(function(){
        Route::get('dashboard', [DashboardController::class, 'index']);    
        Route::get('items', [ItemController::class, 'index'] );
        Route::get('item-add', [ItemController::class, 'add'] );
        Route::post('item-add', [ItemController::class, 'store'] );
        Route::get('item-edit/{slug}', [ItemController::class, 'edit'] );
        Route::post('item-edit/{slug}', [ItemController::class, 'update'] )->name('item.update');
        Route::get('item-delete/{slug}', [ItemController::class, 'delete'] );
        Route::get('item-trash/{slug}', [ItemController::class, 'trash'] );
        Route::get('item-deleted', [ItemController::class, 'deletedItem'] );
        Route::get('item-restore/{slug}', [ItemController::class, 'restore'] );
        // Route::delete('item-destroy/{slug}', [ItemController::class, 'destroy'])->name('items.destroy');
    
    
        Route::get('categories', [CategoryController::class, 'index'] );
        Route::get('category-add', [CategoryController::class, 'add'] );
        Route::post('category-add', [CategoryController::class, 'store'] );
        Route::get('category-edit/{slug}', [CategoryController::class, 'edit'] );
        Route::put('category-edit/{slug}', [CategoryController::class, 'update'] );
        Route::get('category-delete/{slug}', [CategoryController::class, 'delete'] );
        Route::get('category-trash/{slug}', [CategoryController::class, 'trash'] );
        Route::get('category-deleted', [CategoryController::class, 'deletedCategory'] );
        Route::get('category-restore/{slug}', [CategoryController::class, 'restore'] );
    
    
        Route::get('users', [UserController::class, 'index'] );
        Route::get('inactive-users', [UserController::class, 'inactiveUsers']);
        Route::get('user-detail/{slug}', [UserController::class, 'show']);
        Route::get('user-approve/{slug}', [UserController::class, 'approve']);
        Route::get('user-ban/{slug}', [UserController::class, 'delete'] );
        Route::get('user-trash/{slug}', [UserController::class, 'trash'] );
        Route::get('user-banned', [UserController::class, 'userBanned'] );
        Route::get('user-restore/{slug}', [UserController::class, 'restore'] );

        Route::get('item-return', [RentController::class, 'itemReturn']);
        Route::post('item-return', [RentController::class, 'returnForm']);

        Route::get('transaction', [TransactionController::class, 'index'] );
        Route::get('cetak', [TransactionController::class, 'cetak']);
    });

});
