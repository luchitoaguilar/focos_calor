<?php

use Illuminate\Http\Request;

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

Route::group(['as' => 'api.', 'namespace' => 'Api'], function () {
    /*
     * Outlets Endpoints
     */
    Route::get('outlets', 'OutletController@index')->name('outlets.index');
    Route::get('/outlets/divisiones', 'OutletController@divisiones')->name('outlet_map.divisiones');
    Route::get('/outlets/ceo', 'OutletController@ceo')->name('outlets.ceo');
});
