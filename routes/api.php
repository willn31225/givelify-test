<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MoodController;
use App\Http\Controllers\MoodColorController;
use App\Http\Controllers\Api\AuthController;

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
Route::post('/register', [AuthController::class, 'register'])->name('register');
Route::post('/login', [AuthController::class, 'login'])->name('login');

Route::group([
    'middleware'    => ['auth:api']
], function () {
    Route::get('/v1/mood/{month}/{year}', [MoodController::class, 'index']);
    Route::resource('/v1/mood', 'App\Http\Controllers\MoodController');

    Route::get('/v1/mood-color/{id}',  [MoodColorController::class, 'show'])->name('mood-color');
});


