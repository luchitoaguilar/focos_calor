<?php

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

use Illuminate\Support\Facades\Auth;

Route::get('/', 'OutletMapController@index');

Auth::routes();

// Route::get('/home', 'HomeController@index')->name('home');


Route::get('/registrar', 'Auth\RegisterController@create')->name('register.create');
Route::post('/registrar/guardar', 'Auth\RegisterController@store')->name('register.store');
Route::get('/usuarios/listar', 'Auth\RegisterController@listar')->name('register.listar');
Route::get('/usuarios', 'Auth\RegisterController@index')->name('register.index');
Route::get('/usuarios/{id}', 'Auth\RegisterController@show')->name('register.show');
Route::get('/usuarios/edit/{id}', 'Auth\RegisterController@edit')->name('register.edit');
Route::post('/registrar/actualizar', 'Auth\RegisterController@update')->name('register.update');

/*
 * Outlets Routes
 */
Route::get('/our_outlets', 'OutletMapController@index')->name('outlet_map.index');
Route::get('/our_outlets/guarniciones', 'OutletMapController@index_guarniciones')->name('outlet_map.guarniciones');
Route::get('/our_outlets/uudd', 'OutletMapController@index_unidades')->name('outlet_map.uudd');
Route::get('/outlets/listar', [App\Http\Controllers\OutletController::class, 'listar'])->name('listar_outlets');
Route::get('/outlets/activar/{id}', [App\Http\Controllers\OutletController::class, 'activar'])->name('outlets.activar');
Route::resource('outlets', 'OutletController');
Route::get('/outlets/ver_datos/{id}', [App\Http\Controllers\OutletController::class, 'ver_datos'])->name('ver_datos_outlets');

//Unidades dependientes
Route::get('outlets/unidad_dependiente/{division}', [App\Http\Controllers\UnidadController::class, 'unidades'])->name('unidad_dependiente');
