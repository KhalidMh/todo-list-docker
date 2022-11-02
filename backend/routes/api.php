<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ItemController;
use App\Http\Controllers\UserController;
use Symfony\Component\HttpFoundation\Response;

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

Route::apiResource('items', ItemController::class)->missing(function () {
    return response(['Failure' => 'Item not found'], Response::HTTP_NOT_FOUND);
});

Route::apiResource('users', UserController::class)->missing(function () {
    return response(['Failure' => 'User not found'], Response::HTTP_NOT_FOUND);
});

Route::group(['middleware' => 'api', 'prefix' => 'auth'], function () {
    Route::controller(AuthController::class)->group(function () {
        Route::post('register', 'register');
        Route::post('login', 'login');
        Route::post('logout', 'logout');
        Route::post('refresh', 'refresh');
        Route::post('me', 'me');
    });
});
