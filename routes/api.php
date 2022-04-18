<?php

use App\Http\Controllers\api\v1\AddressController;
use App\Http\Controllers\api\v1\AuthController;
use App\Http\Controllers\Api\v1\OrderController;
use App\Http\Controllers\Api\v1\ProductController;
use App\Http\Controllers\Api\v1\UserController;
use App\Http\Controllers\Controller as Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/health', [Controller::class, 'health']);

Route::group(["prefix" => "/v1"], function(){
    Route::controller(AuthController::class)->group(function () {
        Route::post('/login', 'login');
        Route::post('/register', 'register');
    });

    Route::controller(UserController::class)->group(function() {
        Route::get('/users', 'index');
        Route::post('/users', 'store');
        Route::get('/users/{user_id}', 'show');
        Route::put('/users/{user_id}', 'update');
        Route::delete('/users/{user_id}', 'destroy');
    });

    Route::controller(AddressController::class)->prefix('address')->group(function () {
        Route::post('/changeCurrentAddress', 'changeCurrentAddress');
        Route::get('/users/{id}/addresses','index');
        Route::post('/users/{id}/address', 'addNewAddress');
    });

    Route::controller(ProductController::class)->prefix('products')->group(function () {
        //TODO: add routes for products; Make sure these match with the routes from your postman tests!
    });

    Route::controller(OrderController::class)->prefix('orders')->group(function () {
        //TODO: Add routes for orders; Make sure these match with the routes from your postman tests!
    });
});
