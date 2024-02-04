<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;

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

Route::get('/users', [UserController::class, 'index']);
Route::get('/users/{user}', [UserController::class, 'show']);

// Laravel-Data
Route::get('/data/users', [UserController::class, 'index_data']);
Route::get('/data/users/{user}', [UserController::class, 'show_data']);
Route::post('/data/users', [UserController::class, 'create_data']);
Route::put('/data/users/{user}', [UserController::class, 'update_data']);
