<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\CategoryController;
use App\Http\Controllers\Api\UserItemController;
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

Route::post('/auth/login', [AuthController::class, 'loginUser']);

Route::group(['as' => 'api.', 'middleware' => ['auth:sanctum']], function ()
{
    Route::get('/get-categories-with-items', [CategoryController::class, 'getAllWithItem']);
    Route::get('/get-current-state-with-items', [UserItemController::class, 'getCurrentStateWithItems']);
    Route::post('/buy-a-item', [UserItemController::class, 'buyItem']);
    Route::post('/change-avatar', [UserItemController::class, 'changeAvatar']);
});