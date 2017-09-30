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

Route::get('/', function () {
    return view('/auth/login');
});
Route::match(['get','post'],'/logout','HomeController@logout');
// Route::match(['get','post'],'/login.store','HomeController@login');

Route::resource('coloniaCanton', 'ColoniaCantonController');
Route::resource('barrioCaserio', 'BarrioCaserioController');

Route::resource('motorista','MotoristaController');
Route::resource('usuario','UsuarioController');
Route::resource('marca','MarcaController');
Route::resource('modelo','ModeloController');
Route::resource('tipoVM','TipoVMController');
Route::resource('vehiculo','VehiculoController');
Route::match(['get','post'],'/vehiculo/create/{idMarca}','VehiculoController@modelo');
Route::resource('barrioCanton', 'BarrioCantonController');
Route::resource('coloniaCaserio', 'ColoniaCaserioController');
Route::resource('actividad', 'ActividadController');
Route::resource('maquinaria','MaquinariaController');
Route::resource('asignarMotVeh','AsignarMotVehController');
Route::resource('asignarMotMaq','AsignarMotMaqController');
Route::resource('salidaEntrada','SaEnVehiculoController');
Route::match(['get','post'],'/vehiculo2/create/{idMarca}','VehiculoController@modelo2');
Route::resource('tallerE','TallerExternoController');
Route::resource('mecanicoI','MecanicoInternoController');
Route::resource('articulos','ArticuloController');
Route::resource('mantenimientoPre','MantenimientoPreController');
Route::match(['get','post'],'mantenimientoPre/edit/{id}','MantenimientoPreController@create');
Route::resource('mantenimientoPreMaq','MantenimientoPreMaqController');
Route::match(['get','post'],'mantenimientoPreMaq/edit/{id}','MantenimientoPreMaqController@create');

Auth::routes();
Route::get('/home', 'HomeController@index');
