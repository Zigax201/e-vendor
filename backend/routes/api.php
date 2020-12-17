<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\UserController;
use App\Http\Controllers\API\ProductController;
use App\Http\Controllers\API\MidtransController;
use App\Http\Controllers\API\TransactionController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/



Route::group(['middleware' => ['auth:sanctum']], function () {
    Route::get('user',  [UserController::class, 'fetch']);
    Route::post('user/logout', [UserController::class, 'logout']);
    Route::post('user', [UserController::class, 'updateProfile']);
    Route::post('user/photo', [UserController::class, 'updatePhoto']);

    Route::post('checkout', [TransactionController::class, 'checkout']);
    Route::get('transaction', [TransactionController::class, 'all']);
    Route::post('transaction/{id}', [TransactionController::class, 'update']);
});

// route where only admin can access
Route::group(['middleware' => ['auth:sanctum', 'role:admin']], function () {
    // Create product
    Route::post('product', [ProductController::class, 'store']);
    // Delete product
    Route::delete('product/{id}', [ProductController::class, 'delete']);
});

Route::get('product', [ProductController::class, 'index']);

Route::post('user/login', [UserController::class, 'login']);
Route::post('user/register', [UserController::class, 'register']);

Route::post('midtrans/callback', [MidtransController::class, 'callback']);

Route::get('midtrans/success', [MidtransController::class, 'success']);
Route::get('midtrans/unfinish', [MidtransController::class, 'unfinish']);
Route::get('midtrans/error', [MidtransController::class, 'error']);
