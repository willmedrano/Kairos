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
	$users=DB::select('select * from users');
        $cuenta=0;
        foreach ($users as $us) {
          $cuenta=$cuenta+1;
        }
        if($cuenta==0){
            return view('/auth/register');

        }else{
            return view('/auth/login');
        }
    
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
Route::resource('salidaEntrada2','SaEnMaquinariaController');
Route::resource('salidaEntrada3','SaEnCamionController');
Route::match(['get','post'],'/vehiculo3/create/{idMarca}','MaquinariaController@modelo2');
Route::resource('tallerE','TallerExternoController');
Route::resource('mecanicoI','MecanicoInternoController');
Route::resource('articulos','ArticuloController');
Route::resource('mantenimientoPre','MantenimientoPreController');
Route::match(['get','post'],'mantenimientoPre/edit/{id}','MantenimientoPreController@create');
Route::resource('mantenimientoPreMaq','MantenimientoPreMaqController');
Route::match(['get','post'],'mantenimientoPreMaq/edit/{id}','MantenimientoPreMaqController@create');
Route::match(['get','post'],'/llenado/{buscar}','ValesCombustibleController@llenado');
Route::resource('detalleActividad','DetalleActividadController');
Route::resource('vale','ValesCombustibleController');
Route::resource('vales','ValesController');
Route::resource('mantenimientoCorVeh','MantenimientoCorVehController');
Route::match(['get','post'],'busqPlaca','MantenimientoCorVehController@busqVehiculo');
Route::resource('mantenimientoCorMaq','MantenimientoCorMaqController');
Route::match(['get','post'],'busqEquipo','MantenimientoCorMaqController@busqEquipo');
Route::match(['get','post'],'busqEquipo/{idTaller}','MantenimientoCorMaqController@mecanico');
Auth::routes();
Route::get('/home', 'HomeController@index');
//reportes
  Route::match(['get','post'],'reporteMotorista','MotoristaController@reporte');
  Route::match(['get','post'],'reporteVM','VehiculoController@reporte');
  Route::match(['get','post'],'filtroVMA','AsignarMotVehController@filtroVMA');
  Route::match(['get','post'],'reporteVMA','AsignarMotVehController@reporte');
  Route::match(['get','post'],'reporteMP','MantenimientoPreController@reporte');
  Route::match(['get','post'],'filtroMP','MantenimientoPreController@filtroMP');
  Route::match(['get','post'],'reporteMPxVM','MantenimientoPreController@reporteMPxVM');
  Route::match(['get','post'],'reporteMttnPDetalle','MantenimientoPreController@reporteMttnPDetalle');