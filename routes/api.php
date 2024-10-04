<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::group([
    'middleware' => 'api',
    'prefix' => 'auth'
], function ($router) {
    Route::post('login', 'AuthController@login');
    Route::post('logout', 'AuthController@logout');
    Route::post('refresh', 'AuthController@refresh');
    Route::post('me', 'AuthController@me');
});


Route::group([
    'middleware' => 'jwt.auth',
], function ($router) {

    Route::prefix('reservation')->group(function () {
        Route::get('/', 'ReservationController@all');
        Route::post('/', 'ReservationController@create');
        Route::delete('/{id}', 'ReservationController@distroy');
        Route::post('/update', 'ReservationController@update');
        Route::get('/{id}', 'ReservationController@find');
        Route::get('/user/{id}', 'ReservationController@userAll');
    });
});
