<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\UserController;
use App\Http\Controllers\API\RestaurantController;

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
/* 
Route::apiResource("users", UserController::class);
Route::apiResource("restaurants", RestaurantController::class); */

Route::post('register', [UserController::class, 'store']);
Route::get('users', [UserController::class, 'index']);

Route::get('restaurants', [RestaurantController::class, 'index']);
Route::post('restaurant', [RestaurantController::class, 'store']);
Route::put('restaurant/{id}', [RestaurantController::class, 'update']);
Route::delete('restaurant/{id}', [RestaurantController::class, 'destroy']);