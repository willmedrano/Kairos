<?php

namespace Kairos\Http\Controllers;

use Illuminate\Http\Request;
use Kairos\Http\Requests\MttnPreventivoRequest;
use Session;
use Redirect;
use Input;
use DB;
use Response;
use Kairos\Maquinaria;
use Kairos\MecanicoInterno;
use Kairos\MantenimientoPreMaq;
use Kairos\Bitacora;
use Kairos\Orden;

class MantenimientoPreMaqController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $maquinaria=DB::select('SELECT m.id,m.nEquipo,m.horaM,
      m.nombre_img,m.estadoMaq,m.semaforo,m.horaAux
      from maquinarias m
      where  m.estadoMaq=1 ');

      return View('mantenimientoPreventivo.indexMaq',compact('maquinaria'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      $matt=MantenimientoPreMaq::where('estadoMtt',0)->get(); 
      return View('mantenimientoPreventivo.mpRealizadosMaq',compact('matt'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(MttnPreventivoRequest $request)
    {
      Orden::create([
      'nOrden'=>$request['nOrden'],
    ]);

      $idO=Orden::All();
      $id=$idO->last()->id;

      MantenimientoPreMaq::create([
      'idOrden'=>$id,
      'idMecanico'=>$request['idMecanico'],
      'idMaquinaria'=>$request['idMaquinaria'],
      'numTrabajo'=>$request['numTrabajo'],
      'fechaInicioMtt'=>$request['fechaInicioMtt'],
      'fechaFinMtt'=>$request['fechaInicioMtt'],
      'observacionInicioMtt'=>$request['observacionInicioMtt'],
      'observacionFinalMtt'=>"",
    ]);
    $m= Maquinaria::find($request['idMaquinaria']);
    $m->semaforo =2; //el estado del vehiculo cambia a mantt
    $m->save();
    Bitacora::bitacora("Registro de nuevo Mttn Preventico al ': ".$m->nEquipo);
    return redirect('/mantenimientoPreMaq')->with('create','• Mantenimiento preventivo ingresado correctamente');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
      $maquinaria =Maquinaria::where('id',$id)->get();

      $mant =MantenimientoPreMaq::where('idMaquinaria',$id)->where('estadoMtt',1)->get();
      return View('mantenimientoPreventivo.finalizarPreventivoMaq',compact('maquinaria','mant'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id) //llevar equipo a taller
    {
      $orden=Orden::All();
      if ($orden->last()==null) {
        $idO=1;
      }else{
        $idO=$orden->last()->id+1;
      }
      $maquinaria =Maquinaria::where('id',$id)->get();
      $mecanico=MecanicoInterno::where('estadoMec',1)->where('idTaller',1)->get();
      return View('mantenimientoPreventivo.preventivoMaq',compact('maquinaria','mecanico','idO'));

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
      $m= MantenimientoPreMaq::find($id);
      $m->observacionFinalMtt=$request['observacionFinalMtt'];
      $m->fechaFinMtt=$request['fechaFinMtt'];
      $m->gastoMPM=$request['gastoMPM'];
      $m->estadoMtt=0;
      $m->save();

      $mq= Maquinaria::find($request['idMaquinaria']);
      $mq->semaforo =1; //el estado de la maquinaria cambia a disponible
      $mq->horaAux=0;
      $mq->save();
      Bitacora::bitacora("Finalizó el Mttn Preventivo del : ".$m->nEquipo);
      return redirect('/mantenimientoPreMaq');
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
