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
use Kairos\Motorista;
use Kairos\MecanicoInterno;
use Kairos\MantenimientoPreventivo;
use Kairos\MantenimientoPreMaq;
use Kairos\MantenimientoCorrectivoVeh;
use Kairos\MantenimientoCorrectivoMaq;
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
      where v.estadoVeh=1');

      return View('mantenimientoPreventivo.index',compact('vehiculo'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      $matt=MantenimientoPreventivo::where('estadoMtt',1)->get();
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
      'idMotorista'=>$request['idMotorista'],

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
      $orden=Orden::All();
      $motorista=Motorista::All();
      if ($orden->last()==null) {
        $idO=1;
      }else{
        $idO=$orden->last()->id+1;
      }
      $vehiculo =Vehiculo::where('id',$id)->get();
      $mecanico=MecanicoInterno::where('estadoMec',1)->where('idTaller',1)->get();
      return View('mantenimientoPreventivo.preventivo',compact('vehiculo','mecanico','idO','motorista'));
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
    }
    public function finalizadas($id)
    {
      $matt=MantenimientoPreventivo::where('estadoMtt',0)->get();
      return View('mantenimientoPreventivo.mpRealizados',compact('matt'));
    }
    public function pendientes($id)
    {
      $matt=MantenimientoPreventivo::where('estadoMtt',1)->get();
      return View('mantenimientoPreventivo.mpRealizados',compact('matt'));
    }
    public function filtroMP()
    {
      $vh=Vehiculo::All();
      $mq=Maquinaria::All();
      $orden1=MantenimientoPreventivo::All();
      $orden2=MantenimientoPreMaq::All();
      return view('reportes.FiltroMttnPreventivo',compact('orden1','orden2','vh','mq'));
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
        $orden=$request->ordenD;
        $matt=MantenimientoPreventivo::where('idOrden',$orden)->get();

          if($matt->last()!=null){
              $date = date('d-m-Y');
              $date1 = date('g:i:s a');
              $vistaurl="reportes.reporteMttnPDetalle";
              $opc=1;
              $view =  \View::make($vistaurl, compact('matt','date','date1','opc'))->render();
              $pdf = \App::make('dompdf.wrapper');
              $pdf->loadHTML($view);
              return $pdf->stream('MPD por Vehiculo '.$date.'.pdf');
          }else{ 

          $matt=MantenimientoPreMaq::where('idOrden',$orden)->get();

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

    public function impOrden(Request $request)//por orden
    {      

        $id=$request->idVM;
        $opcion=$request->opc;
        //vehiculo mttn preventivo
        if ($opcion==1) {
        $matt=MantenimientoPreventivo::where('idVehiculo',$id)->where('estadoMtt',1)->get();
        
          $date = date('d-m-Y');
              $date1 = date('g:i:s a');
              $vistaurl="reportes.reporteMttnPDetalle";
              $opc=1;
              $view =  \View::make($vistaurl, compact('matt','date','date1','opc'))->render();
              $pdf = \App::make('dompdf.wrapper');
              $pdf->loadHTML($view);
              return $pdf->stream('orden de trabajo '.$date.'.pdf');
        }
        //maquinaria mttn preventivo
        if ($opcion==2) {
        $matt=MantenimientoPreMaq::where('idMaquinaria',$id)->where('estadoMtt',1)->get();
        
          $date = date('d-m-Y');
              $date1 = date('g:i:s a');
              $vistaurl="reportes.reporteMttnPDetalle";
              $opc=2;
              $view =  \View::make($vistaurl, compact('matt','date','date1','opc'))->render();
              $pdf = \App::make('dompdf.wrapper');
              $pdf->loadHTML($view);
              return $pdf->stream('orden de trabajo '.$date.'.pdf');
        }
        //vehiculo mttn correctivo
        if ($opcion==3) {
        $matt=MantenimientoCorrectivoVeh::where('idVehiculo',$id)->where('estadoMttC',1)->get();
        
          $date = date('d-m-Y');
              $date1 = date('g:i:s a');
              $vistaurl="reportes.reporteMttnCDetalle";
              $opc=1;
              $view =  \View::make($vistaurl, compact('matt','date','date1','opc'))->render();
              $pdf = \App::make('dompdf.wrapper');
              $pdf->loadHTML($view);
              return $pdf->stream('orden de trabajo '.$date.'.pdf');
        }
        //maquinaria mttn correctivo
        if ($opcion==4) {
        $matt=MantenimientoCorrectivoMaq::where('idMaquinaria',$id)->where('estadoMttC',1)->get();
        
          $date = date('d-m-Y');
              $date1 = date('g:i:s a');
              $vistaurl="reportes.reporteMttnCDetalle";
              $opc=2;
              $view =  \View::make($vistaurl, compact('matt','date','date1','opc'))->render();
              $pdf = \App::make('dompdf.wrapper');
              $pdf->loadHTML($view);
              return $pdf->stream('orden de trabajo '.$date.'.pdf');
        }

              
         
    }
    
}
