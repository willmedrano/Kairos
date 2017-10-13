<?php

namespace Kairos\Http\Controllers;

use Illuminate\Http\Request;
use Session;
use Redirect;
use Input;
use DB;
use Response;
use Kairos\Vehiculo;
use Kairos\TallerE;
use Kairos\Motorista;
use Kairos\MantenimientoCorrectivoVeh;

class MantenimientoCorVehController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $vehiculo=DB::select('SELECT m.idVehiculo,v.nPlaca,
      v.nombre_img,v.semaforo,v.id
      from mantenimiento_correctivo_vehs m, vehiculos v
      where m.idVehiculo=v.id and m.estadoMttC=1');

      return View('mantenimientoCorrectivo.indexVeh',compact('vehiculo'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      $matt=mantenimientoCorrectivoVeh::where('estadoMttC',0)->get();
      return View('mantenimientoCorrectivo.mcRealizados',compact('matt'));
    }

    public function busqVehiculo(Request $request)
    {
        $numP=$request->placa;
        $vehiculo =Vehiculo::where('nPlaca',$numP)->get();

        $taller=TallerE::where('estadoTE',1)->get();
        $motorista=Motorista::where('estadoMot',1)->get();
        return View('mantenimientoCorrectivo.createVeh',compact('vehiculo','taller','motorista'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      MantenimientoCorrectivoVeh::create([
      'idTaller'=>$request['idTaller'],
      'idVehiculo'=>$request['idVehiculo'],
      'idMotorista'=>$request['idMotorista'],
      'numTrabajo'=>$request['numTrabajo'],
      'fechaInicioMtt'=>$request['fechaInicioMtt'],
      'fechaFinMtt'=>$request['fechaInicioMtt'],
      'fallasVeh'=>$request['fallasVeh'],
      'diagnosticoMec'=>"",
    ]);
    $v= Vehiculo::find($request['idVehiculo']);
    $v->semaforo =4; //el estado del vehiculo cambia a mantt Correctivo
    $v->save();
    return redirect('/mantenimientoCorVeh')->with('create','• Mantenimiento correctivo ingresado correctamente');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
      $vehiculo =Vehiculo::where('id',$id)->get();
      $mant =MantenimientoCorrectivoVeh::where('idVehiculo',$id)->where('estadoMttC',1)->get();
      return View('mantenimientoCorrectivo.finalizarCorVeh',compact('vehiculo','mant'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
      $m= MantenimientoCorrectivoVeh::find($id);
      $m->diagnosticoMec=$request['diagnosticoMec'];
      $m->fechaFinMtt=$request['fechaFinMtt'];
      $m->gastoMC=$request['gastoMC'];
      $m->estadoMttC=0;
      $m->save();

      $v= Vehiculo::find($request['idVehiculo']);
      $v->semaforo =1; //el estado del vehiculo cambia a disponible
      $v->save();

      return redirect('/mantenimientoCorVeh');
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
