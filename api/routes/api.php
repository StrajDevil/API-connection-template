<?php

use App\Http\Controllers\LoginController;
use App\Http\Controllers\NumbersController;
use App\Http\Controllers\ServiceController;
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

Route::post('/login', [LoginController::class, 'authenticate']);

Route::group(['middleware' => 'auth:sanctum'], function () {
    Route::get('/service', [ServiceController::class, 'index']);
    Route::post('/send', [ServiceController::class, 'send']);
    Route::get('/numbers-types', [NumbersController::class, 'getTypes']);
});
