<?php

namespace Kairos\Http\Controllers;

use Illuminate\Http\Request;
use Kairos\Http\Requests\MttnCorrectivoRequest;
use Session;
use Redirect;
use Input;
use DB;
use Response;
use Kairos\Vehiculo;
use Kairos\Maquinaria;
use Kairos\TallerE;
use Kairos\Motorista;
use Kairos\MantenimientoCorrectivoVeh;
use Kairos\MantenimientoCorrectivoMaq;
use Kairos\MantenimientoPreventivo;
use Kairos\AsignarMotVeh;
use Kairos\Orden;
use Kairos\Bitacora;

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
      $veh=Vehiculo::All();

      return View('mantenimientoCorrectivo.indexVeh',compact('vehiculo','veh'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create() //realizar mttn correctivo
    {
      $matt=MantenimientoCorrectivoVeh::All();
      return View('mantenimientoCorrectivo.mcRealizados',compact('matt'));
    }

    public function busqVehiculo(Request $request)
    {
        $numP=$request->placaV;
        $vehiculo =Vehiculo::where('nPlaca',$numP)->get();
        if ($vehiculo->last()!=null)
         {
          $a=$vehiculo->last();//obtener ultimo registro
          $asignado=AsignarMotVeh::where('idVehiculo',$a->id)->where('estadoAsignacion',1)->get();
           //si el vehiculo se encuentra asignado con estado activo
          if ($asignado->last()!=null) {
            $b=$asignado->last();        
            $mo=$b->idMotorista;
            $mot=AsignarMotVeh::motorista($mo);//obtener nombre del motorista
          }else{
            $mot="";
            $mo=0;
          }  
          //primero se evalua que no este en mttn preventivo
          $MP=MantenimientoPreventivo::where('idVehiculo',$a->id)->where('estadoMtt',1)->get();
          if ($MP->last()!=null) {
            Session::flash('update','• Este Vehiculo ya se encuentra en un mantenimiento');
            return $this->index();          
          }
          $MC=MantenimientoCorrectivoVeh::where('idVehiculo',$a->id)->where('estadoMttC',1)->get();
          //si el vehiculo ya se encuentra en mttc redirecciona al index
          if ($MC->last()!=null) {
            return $this->index();          
          }else{//si el vehiculo no se encuentra en mttc nos permitira llevar a cabo el registro
            $orden=Orden::All();
              if ($orden->last()==null) {
                $idO=1;
              }else{
                $idO=$orden->last()->id+1;
              }
            $taller=TallerE::where('estadoTE',1)->get();
            $motorista=Motorista::where('estadoMot',1)->where('tipoMot','Motorista')->get();
            return View('mantenimientoCorrectivo.createVeh',compact('vehiculo','taller','motorista','mot','mo','idO'));
          } 
        }else
        {
          return $this->index(); 
        }
               
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(MttnCorrectivoRequest $request)
    {

      Orden::create([
      'nOrden'=>$request['nOrden'],
    ]);

      $idO=Orden::All();
      $id=$idO->last()->id;

      MantenimientoCorrectivoVeh::create([
      'idOrden'=>$id,
      'idMecanico'=>$request['mecanico'],
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
    Bitacora::bitacora("Registro de nuevo Mttn Correctivo al Vehiculo': ".$v->nPlaca);
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
      Bitacora::bitacora("Finalizó el Mttn Correctivo del Vehiculo: ".$v->nPlaca);
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
    public function filtroMC()
    {
      $vh=Vehiculo::All();
      $mq=Maquinaria::All();
      $orden1=MantenimientoCorrectivoVeh::All();
      $orden2=MantenimientoCorrectivoMaq::All();
      return view('reportes.FiltroMttnCorrectivo',compact('orden1','orden2','vh','mq'));
    }

    public function reporte(Request $request)//reporte Mttn Correctivo general
    {

      $fch1=$request->fechaInicial;
      $fch2=$request->fechaFinal;

      $matt=MantenimientoCorrectivoVeh::whereDate('fechaInicioMtt', '>=' , $fch1)->whereDate('fechaFinMtt', '<=', $fch2)->where('estadoMttC',0)->get();

      $mattM=MantenimientoCorrectivoMaq::whereDate('fechaInicioMtt', '>=' , $fch1)->whereDate('fechaFinMtt', '<=', $fch2)->where('estadoMttC',0)->get();

      $date = date('d-m-Y');
      $date1 = date('g:i:s a');
      $vistaurl="reportes.reporteMttnC";
      $view =  \View::make($vistaurl, compact('matt','mattM','date','date1','fch1','fch2'))->render();
      $pdf = \App::make('dompdf.wrapper');
      $pdf->loadHTML($view);
      $pdf->setPaper('A4', 'landscape');
      return $pdf->stream('Mttn Correctivos '.$date.'.pdf');
    }

    public function reporteMCxVM(Request $request)//reporte Mttn C x VM
    {

      $fch1=$request->fechaInicial;
      $fch2=$request->fechaFinal;
      $opcion=$request->vm;

      $vehiculo=Vehiculo::where('nPlaca',$opcion)->get();

      if($vehiculo->last()!=null){
        
          $matt=MantenimientoCorrectivoVeh::whereDate('fechaInicioMtt', '>=' , $fch1)->whereDate('fechaFinMtt', '<=', $fch2)->where('estadoMttC',0)->where('idVehiculo',$vehiculo->last()->id)->get();

          $date = date('d-m-Y');
          $date1 = date('g:i:s a');
          $vistaurl="reportes.reporteMttnCxVM";
          $opc=1;
          $view =  \View::make($vistaurl, compact('matt','date','date1','fch1','fch2','opc'))->render();
          $pdf = \App::make('dompdf.wrapper');
          $pdf->loadHTML($view);
          $pdf->setPaper('A4', 'landscape');
          return $pdf->stream('Mttn Correctivo por Vehiculo '.$date.'.pdf');
      }else{
          $maquinaria=Maquinaria::where('nEquipo',$opcion)->get();      

          $matt=MantenimientoCorrectivoMaq::whereDate('fechaInicioMtt', '>=' , $fch1)->whereDate('fechaFinMtt', '<=', $fch2)->where('estadoMttC',0)->where('idMaquinaria',$maquinaria->last()->id)->get();

          $date = date('d-m-Y');
          $date1 = date('g:i:s a');
          $vistaurl="reportes.reporteMttnCxVM";
          $opc=2;
          $view =  \View::make($vistaurl, compact('matt','date','date1','fch1','fch2','opc'))->render();
          $pdf = \App::make('dompdf.wrapper');
          $pdf->loadHTML($view);
          $pdf->setPaper('A4', 'landscape');
          return $pdf->stream('Mttn Correctivo por Maquinaria '.$date.'.pdf');
      }

    }
    public function reporteMttnCDetalle(Request $request)
    {
        $orden=$request->ordenDP;
        $matt=MantenimientoCorrectivoVeh::where('idOrden',$orden)->get();

          if($matt->last()!=null){                         
              $date = date('d-m-Y');
              $date1 = date('g:i:s a');
              $vistaurl="reportes.reporteMttnCDetalle";
              $opc=1;
              $view =  \View::make($vistaurl, compact('matt','date','date1','opc'))->render();
              $pdf = \App::make('dompdf.wrapper');
              $pdf->loadHTML($view);
              return $pdf->stream('MCD por Vehiculo '.$date.'.pdf');
          }else{
          
          $matt=MantenimientoCorrectivoMaq::where('idOrden',$orden)->get();

          $date = date('d-m-Y');
          $date1 = date('g:i:s a');
          $vistaurl="reportes.reporteMttnCDetalle";
          $opc=2;
          $view =  \View::make($vistaurl, compact('matt','date','date1','opc'))->render();
          $pdf = \App::make('dompdf.wrapper');
          $pdf->loadHTML($view);
          return $pdf->stream('MCD por Maquinaria '.$date.'.pdf');
      }

         
    }
}
