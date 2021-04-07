<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MoodController;
use App\Http\Controllers\MoodColorController;

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

Route::post('/register', 'Api\AuthController@register')->name('register');
Route::post('/login', 'Api\AuthController@login')->name('login');

Route::get('/v1/mood/{month}/{year}', [MoodController::class, 'index'])->middleware('auth:api');
Route::resource('/v1/mood', 'App\Http\Controllers\MoodController')->middleware('auth:api');

Route::get('/v1/mood-color/{id}',  [MoodColorController::class, 'show'])->name('mood-color');
