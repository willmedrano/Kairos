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

Route::group(['middleware' => 'guest'], function () {
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
});
Route::group(['middleware' => 'auth'], function () {
Route::match(['get','post'],'/logout','HomeController@logout');
Route::match(['get','post'],'acerca','HomeController@acerca');
// Route::match(['get','post'],'/login.store','HomeController@login');

 // Route::group(['middleware'=>'acceso'], function(){

// });

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
//--------------------------reportes
//reporte motorista
Route::match(['get','post'],'reporteMotorista','MotoristaController@reporte');
//reporte inventario V/M
Route::match(['get','post'],'reporteVM','VehiculoController@reporte');
//reporte Asignaciones
Route::match(['get','post'],'filtroVMA','AsignarMotVehController@filtroVMA');
Route::match(['get','post'],'reporteVMA','AsignarMotVehController@reporte');
//reprotes Mttn Preventivo
Route::match(['get','post'],'reporteMP','MantenimientoPreController@reporte');
Route::match(['get','post'],'filtroMP','MantenimientoPreController@filtroMP');
Route::match(['get','post'],'reporteMPxVM','MantenimientoPreController@reporteMPxVM');
Route::match(['get','post'],'reporteMttnPDetalle','MantenimientoPreController@reporteMttnPDetalle');
Route::match(['get','post'],'impOrden','MantenimientoPreController@impOrden');
//reportes Mttn Correctivo
Route::match(['get','post'],'filtroMC','MantenimientoCorVehController@filtroMC');
Route::match(['get','post'],'reporteMC','MantenimientoCorVehController@reporte');
Route::match(['get','post'],'reporteMCxVM','MantenimientoCorVehController@reporteMCxVM');
Route::match(['get','post'],'reporteMttnCDetalle','MantenimientoCorVehController@reporteMttnCDetalle');
Route::match(['get','post'],'reporteBarrio','BarrioCantonController@reporte');
Route::match(['get','post'],'reporteCanton','BarrioCantonController@reporte2');
Route::match(['get','post'],'filtroVale','ValesCombustibleController@filtroVale');
Route::match(['get','post'],'filtroValeV','ValesCombustibleController@valeXV');
Route::match(['get','post'],'filtroValeM','ValesCombustibleController@valeXM');
Route::match(['get','post'],'filtroValeA','ValesCombustibleController@valeXA');
Route::match(['get','post'],'reporteValeAll','ValesCombustibleController@reporteAll');
Route::match(['get','post'],'reporteVale','ValesCombustibleController@reporte');
Route::match(['get','post'],'reporteEntradaV','SaEnVehiculoController@reporte');
Route::match(['get','post'],'reporteEntradaM','SaEnMaquinariaController@reporte');
Route::match(['get','post'],'reporteEntradaC','SaEnCamionController@reporte');
Route::match(['get','post'],'filtroSaEnVehiculo','SaEnVehiculoController@filtroSa');
Route::match(['get','post'],'bitacora','SaEnVehiculoController@bitacora');
Route::match(['get','post'],'excelV','SaEnVehiculoController@excel');
  
Route::match(['get','post'],'excelM','SaEnMaquinariaController@excel');
  
Route::match(['get','post'],'excelC','SaEnCamionController@excel');
  });
Route::match(['get','post'],'postGenerateBackup','HomeController@postGenerateBackup');
Auth::routes();