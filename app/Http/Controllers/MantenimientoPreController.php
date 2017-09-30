<?php

namespace Kairos\Http\Controllers;

use Illuminate\Http\Request;
use Session;
use Redirect;
use Input;
use DB;
use Response;
use Kairos\Vehiculo;
use Kairos\MecanicoInterno;
use Kairos\MantenimientoPreventivo;

class MantenimientoPreController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $vehiculo=DB::select('SELECT v.id,v.nPlaca,v.kilometrajeM,
      v.nombre_img,v.estadoVeh,v.semaforo,v.kilometrajeAux
      from vehiculos v
      where v.kilometrajeAux>=v.kilometrajeM and v.estadoVeh=1 ');

      return View('mantenimientoPreventivo.index',compact('vehiculo'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      $matt=MantenimientoPreventivo::All();                
      return View('mantenimientoPreventivo.mpRealizados',compact('matt'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      MantenimientoPreventivo::create([
      'idMecanico'=>$request['idMecanico'],
      'idVehiculo'=>$request['idVehiculo'],
      'numTrabajo'=>$request['numTrabajo'],
      'fechaInicioMtt'=>$request['fechaInicioMtt'],
      'fechaFinMtt'=>$request['fechaInicioMtt'],
      'observacionInicioMtt'=>$request['observacionInicioMtt'],
      'observacionFinalMtt'=>"",
    ]);
    $v= Vehiculo::find($request['idVehiculo']);
    $v->semaforo =2; //el estado del vehiculo cambia a mantt
    $v->save();
    return redirect('/mantenimientoPre')->with('create','• Mantenimiento preventivo ingresado correctamente');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id) //finalizar el mantenimento del vehiculo
    {
      $vehiculo =Vehiculo::where('id',$id)->get();

      // $mant=DB::select('SELECT * from mantenimiento_preventivos
      // where idVehiculo=$id and v.estadoVeh=1 ');

      $mant =MantenimientoPreventivo::where('idVehiculo',$id)->where('estadoMtt',1)->get();
      return View('mantenimientoPreventivo.finalizarPreventivo',compact('vehiculo','mant'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id) //llevar el vehiculo a taller
    {
      $vehiculo =Vehiculo::where('id',$id)->get();
      $mecanico=MecanicoInterno::where('estadoMec',1)->get();
      return View('mantenimientoPreventivo.preventivo',compact('vehiculo','mecanico'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $m= MantenimientoPreventivo::find($id);
        $m->observacionFinalMtt=$request['observacionFinalMtt'];
        $m->fechaFinMtt=$request['fechaFinMtt'];
        $m->gastoMP=$request['gastoMP'];
        $m->estadoMtt=0;
        $m->save();

        $v= Vehiculo::find($request['idVehiculo']);
        $v->semaforo =1; //el estado del vehiculo cambia a disponible
        $v->save();

        return redirect('/mantenimientoPre');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
