<?php

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

Route::get('/', function () {
    return view('welcome');
});

/* Route::post('/register', UserController::class, 'store');
Route::get('/users', UserController::class, 'index');

Route::get('/restaurants', RestaurantController::class, 'index');
Route::post('/restaurant', RestaurantController::class, 'store');
Route::put('/restaurant/{id}', RestaurantController::class, 'update');
Route::delete('/restaurant/{id}', RestaurantController::class, 'destroy');
 */