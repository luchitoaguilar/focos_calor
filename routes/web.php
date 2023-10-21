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


URL::forceScheme('https');

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
Route::delete('/outlets/eliminar/{id}', [App\Http\Controllers\OutletController::class, 'eliminar'])->name('outlets.eliminar');
Route::get('/outlets/activar/{id}', [App\Http\Controllers\OutletController::class, 'activar'])->name('outlets.activar');
Route::resource('outlets', 'OutletController');
Route::get('/outlets/ver_datos/{id}', [App\Http\Controllers\OutletController::class, 'ver_datos'])->name('ver_datos_outlets');


//Documetnacion
Route::get('/documentacion/listar', 'DocumentacionController@listar')->name('documentacion.listar');
Route::get('/documentacion/{id}', 'DocumentacionController@show')->name('documentacion.show');
Route::get('/documentacion', 'DocumentacionController@create')->name('documentacion.create');
Route::post('/documentacion/guardar', 'DocumentacionController@store')->name('documentacion.store');
Route::get('/documenta', 'DocumentacionController@index')->name('documentacion.index');
Route::get('/documentacion/edit/{id}', 'DocumentacionController@edit')->name('DocumentacionController.edit');
Route::post('/documentacion/actualizar', 'DocumentacionController@update')->name('DocumentacionController.update');


//POn
Route::get('/pon/listar', 'DocumentacionController@listarPon')->name('documentacion.pon.listar');
Route::get('/doc_pon', 'DocumentacionController@index_pon')->name('documentacion.pon.index');


//NNVVAA
Route::get('/nva/listar', 'DocumentacionController@listarNva')->name('documentacion.nva.listar');
Route::get('/doc_nva', 'DocumentacionController@index_nva')->name('documentacion.nva.index');

//NS
Route::get('/ns/listar', 'DocumentacionController@listarNs')->name('documentacion.ns.listar');
Route::get('/doc_ns', 'DocumentacionController@index_ns')->name('documentacion.ns.index');

//Boletines
Route::get('/boletines/listar', 'DocumentacionController@listarBoletines')->name('documentacion.boletines.listar');
Route::get('/doc_boletines', 'DocumentacionController@index_boletines')->name('documentacion.boletines.index');

//Formulario
Route::get('/form/listar', 'DocumentacionController@listarForm')->name('documentacion.form.listar');
Route::get('/doc_form', 'DocumentacionController@index_form')->name('documentacion.form.index');

//Unidades dependientes
Route::get('outlets/unidad_dependiente/{division}', [App\Http\Controllers\UnidadController::class, 'unidades'])->name('unidad_dependiente');

//PON
Route::get('/pon', 'HomeController@pon')->name('pon');

//MISION
Route::get('/mision', 'HomeController@mision')->name('mision');

//VISION
Route::get('/vision', 'HomeController@vision')->name('vision');

//OBJETIVO
Route::get('/objetivo', 'HomeController@objetivo')->name('objetivo');

//PRESENTACION
Route::get('/presentacion', 'HomeController@presentacion')->name('presentacion');

//OBJETO
Route::get('/objeto', 'HomeController@objeto')->name('objeto');

//FINALIDAD
Route::get('/finalidad', 'HomeController@finalidad')->name('finalidad');

//IMPORTANCIA
Route::get('/importancia', 'HomeController@importancia')->name('importancia');