<?php

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

Route::get('enjoy', \App\Http\Controllers\Api\EnjoyController::class)->name('enjoy');
Route::get('sleep', \App\Http\Controllers\Api\SleepController::class);
Route::get('travel', \App\Http\Controllers\Api\TravelController::class);
Route::get('eat', \App\Http\Controllers\Api\EatController::class);
Route::get('drink', \App\Http\Controllers\Api\DrinkController::class);
