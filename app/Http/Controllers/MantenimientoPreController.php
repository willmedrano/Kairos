<?php

namespace Kairos\Http\Controllers;

use Illuminate\Http\Request;
use Session;
use Redirect;
use Input;
use DB;
use Response;
use Kairos\Vehiculo;
use Kairos\Maquinaria;
use Kairos\MecanicoInterno;
use Kairos\MantenimientoPreventivo;
use Kairos\MantenimientoPreMaq;
use Kairos\Bitacora;
use Kairos\Http\Requests\MttnPreventivoRequest;
use Kairos\Orden;


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
      where v.estadoVeh=1 ');

      return View('mantenimientoPreventivo.index',compact('vehiculo'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      $matt=MantenimientoPreventivo::where('estadoMtt',0)->get();
      return View('mantenimientoPreventivo.mpRealizados',compact('matt'));
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

      MantenimientoPreventivo::create([
      'idOrden'=>$id,
      'idMecanico'=>$request['idMecanico'],
      'idVehiculo'=>$request['idVehiculo'],
      'fechaInicioMtt'=>$request['fechaInicioMtt'],
      'fechaFinMtt'=>$request['fechaInicioMtt'],
      'observacionInicioMtt'=>$request['observacionInicioMtt'],
      'observacionFinalMtt'=>"",
    ]);
    $v= Vehiculo::find($request['idVehiculo']);
    $v->semaforo =2; //el estado del vehiculo cambia a mantt
    $v->save();
    Bitacora::bitacora("Registro de nuevo Mttn Preventico al Vehiculo': ".$v->nPlaca);
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
        $v->kilometrajeAux =0;
        $v->save();
        Bitacora::bitacora("Finalizó el Mttn Preventivo del Vehiculo: ".$v->nPlaca);
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
    public function filtroMP()
    {
      return view('reportes.FiltroMttnPreventivo');
    }
    public function reporte(Request $request) //General
    {

      $fch1=$request->fechaInicial;
      $fch2=$request->fechaFinal;

      $matt=MantenimientoPreventivo::whereDate('fechaInicioMtt', '>=' , $fch1)->whereDate('fechaFinMtt', '<=', $fch2)->where('estadoMtt',0)->get();

      $mattM=MantenimientoPreMaq::whereDate('fechaInicioMtt', '>=' , $fch1)->whereDate('fechaFinMtt', '<=', $fch2)->where('estadoMtt',0)->get();

      $date = date('d-m-Y');
      $date1 = date('g:i:s a');
      $vistaurl="reportes.reporteMttnP";
      $view =  \View::make($vistaurl, compact('matt','mattM','date','date1','fch1','fch2'))->render();
      $pdf = \App::make('dompdf.wrapper');
      $pdf->loadHTML($view);
      $pdf->setPaper('A4', 'landscape');
      return $pdf->stream('Mttn Preventivos '.$date.'.pdf');
    }

    public function reporteMPxVM(Request $request) //por V/M todos
    {

      $fch1=$request->fechaInicial;
      $fch2=$request->fechaFinal;
      $opcion=$request->vm;

      $vehiculo=Vehiculo::where('nPlaca',$opcion)->get();

      if($vehiculo->last()!=null){
        
          $matt=MantenimientoPreventivo::whereDate('fechaInicioMtt', '>=' , $fch1)->whereDate('fechaFinMtt', '<=', $fch2)->where('estadoMtt',0)->where('idVehiculo',$vehiculo->last()->id)->get();

          $date = date('d-m-Y');
          $date1 = date('g:i:s a');
          $vistaurl="reportes.reporteMttnPxVM";
          $opc=1;
          $view =  \View::make($vistaurl, compact('matt','date','date1','fch1','fch2','opc'))->render();
          $pdf = \App::make('dompdf.wrapper');
          $pdf->loadHTML($view);
          $pdf->setPaper('A4', 'landscape');
          return $pdf->stream('Mttn Preventivos por Vehiculo '.$date.'.pdf');
      }else{
          $maquinaria=Maquinaria::where('nEquipo',$opcion)->get();      

          $matt=MantenimientoPreMaq::whereDate('fechaInicioMtt', '>=' , $fch1)->whereDate('fechaFinMtt', '<=', $fch2)->where('estadoMtt',0)->where('idMaquinaria',$maquinaria->last()->id)->get();

          $date = date('d-m-Y');
          $date1 = date('g:i:s a');
          $vistaurl="reportes.reporteMttnPxVM";
          $opc=2;
          $view =  \View::make($vistaurl, compact('matt','date','date1','fch1','fch2','opc'))->render();
          $pdf = \App::make('dompdf.wrapper');
          $pdf->loadHTML($view);
          $pdf->setPaper('A4', 'landscape');
          return $pdf->stream('Mttn Preventivos por Maquinaria '.$date.'.pdf');
      }

    }

    public function reporteMttnPDetalle(Request $request)//por orden
    {

        $opcion=$request->vm;
        $orden=$request->orden;

      
          $vehiculo=Vehiculo::where('nPlaca',$opcion)->get();

          if($vehiculo->last()!=null){
            
              $matt=MantenimientoPreventivo::where('estadoMtt',0)->where('idVehiculo',$vehiculo->last()->id)->where('idOrden',$orden)->get();

              $date = date('d-m-Y');
              $date1 = date('g:i:s a');
              $vistaurl="reportes.reporteMttnPDetalle";
              $opc=1;
              $view =  \View::make($vistaurl, compact('matt','date','date1','opc'))->render();
              $pdf = \App::make('dompdf.wrapper');
              $pdf->loadHTML($view);
              return $pdf->stream('MPD por Vehiculo '.$date.'.pdf');
          }else{
          $maquinaria=Maquinaria::where('nEquipo',$opcion)->get();      

          $matt=MantenimientoPreMaq::where('estadoMtt',0)->where('idMaquinaria',$maquinaria->last()->id)->where('idOrden',$orden)->get();

          $date = date('d-m-Y');
          $date1 = date('g:i:s a');
          $vistaurl="reportes.reporteMttnPDetalle";
          $opc=2;
          $view =  \View::make($vistaurl, compact('matt','date','date1','opc'))->render();
          $pdf = \App::make('dompdf.wrapper');
          $pdf->loadHTML($view);
          return $pdf->stream('MPD por Maquinaria '.$date.'.pdf');
      }

         
    }
    
}
