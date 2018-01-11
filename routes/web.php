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

//rutas extras
Route::match(['get','post'],'/motorista/desactivo/{id}','MotoristaController@desactivo');
Route::match(['get','post'],'/marca/maquinaria/{id}','MarcaController@maquinaria');
Route::match(['get','post'],'/tipoVM/maquinaria/{id}','TipoVMController@maquinaria');
Route::match(['get','post'],'/barrioCanton/barrio/{id}','BarrioCantonController@barrio');
Route::match(['get','post'],'/barrioCanton/canton/{id}','BarrioCantonController@canton');
Route::match(['get','post'],'/actividad/finalizadas/{id}','ActividadController@finalizadas');
Route::match(['get','post'],'/actividad/pendientes/{id}','ActividadController@pendientes');
Route::match(['get','post'],'/asignarMotVeh/create/pendientes/{id}','AsignarMotVehController@pendientes');
Route::match(['get','post'],'/asignarMotVeh/create/finalizadas/{id}','AsignarMotVehController@finalizadas');
Route::match(['get','post'],'/asignarMotMaq/create/pendientes/{id}','AsignarMotMaqController@pendientes');
Route::match(['get','post'],'/asignarMotMaq/create/finalizadas/{id}','AsignarMotMaqController@finalizadas');
Route::match(['get','post'],'/tallerE/desactivo/{id}','TallerExternoController@desactivo');
Route::match(['get','post'],'/mecanicoI/desactivo/{id}','MecanicoInternoController@desactivo');
Route::match(['get','post'],'/mantenimientoPre/create/pendientes/{id}','MantenimientoPreController@pendientes');
Route::match(['get','post'],'/mantenimientoPre/create/finalizadas/{id}','MantenimientoPreController@finalizadas');
Route::match(['get','post'],'/mantenimientoPreMaq/create/pendientes/{id}','MantenimientoPreMaqController@pendientes');
Route::match(['get','post'],'/mantenimientoPreMaq/create/finalizadas/{id}','MantenimientoPreMaqController@finalizadas');
Route::match(['get','post'],'/mantenimientoCorVeh/create/pendientes/{id}','MantenimientoCorVehController@pendientes');
Route::match(['get','post'],'/mantenimientoCorVeh/create/finalizadas/{id}','MantenimientoCorVehController@finalizadas');
Route::match(['get','post'],'/mantenimientoCorMaq/create/pendientes/{id}','MantenimientoCorMaqController@pendientes');
Route::match(['get','post'],'/mantenimientoCorMaq/create/finalizadas/{id}','MantenimientoCorMaqController@finalizadas');
Route::match(['get','post'],'/vehiculo/desactivo/{id}','VehiculoController@desactivo');
Route::match(['get','post'],'/maquinaria/desactivo/{id}','MaquinariaController@desactivo');

//

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
Route::match(['get','post'],'reporteEntradaV2','SaEnVehiculoController@reporte2');
Route::match(['get','post'],'reporteEntradaM','SaEnMaquinariaController@reporte');
Route::match(['get','post'],'reporteEntradaM2','SaEnMaquinariaController@reporte2');
Route::match(['get','post'],'reporteEntradaMEx','SaEnMaquinariaController@excel2');
Route::match(['get','post'],'reporteEntradaC','SaEnCamionController@reporte');
Route::match(['get','post'],'reporteEntradaC2','SaEnCamionController@reporte2');
Route::match(['get','post'],'reporteEntradaCEx','SaEnCamionController@excel2');
Route::match(['get','post'],'filtroSaEnVehiculo','SaEnVehiculoController@filtroSa');
Route::match(['get','post'],'bitacora','SaEnVehiculoController@bitacora');
Route::match(['get','post'],'excelV','SaEnVehiculoController@excel');
  
Route::match(['get','post'],'excelM','SaEnMaquinariaController@excel');
  
Route::match(['get','post'],'excelC','SaEnCamionController@excel');
Route::match(['get','post'],'/salidaEntrada/create/{idMarca}','SaEnVehiculoController@nuevo');
  
Route::match(['get','post'],'/salidaEntrada2/create/{idMarca}','SaEnMaquinariaController@nuevo');
  });
Route::match(['get','post'],'postGenerateBackup','HomeController@postGenerateBackup');
Auth::routes();