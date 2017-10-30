<?php

namespace Kairos\Http\Controllers;

use Session;
use Redirect;
use Response;
use DB;
use Kairos\Vehiculo;
use Kairos\Marca;
use Kairos\TipoVmq;
use Kairos\Motorista;
use Kairos\AsignarMotVeh;
use Kairos\AsignarMotMaq;
use Kairos\Bitacora;
use Carbon\Carbon;

use Illuminate\Http\Request;

class AsignarMotVehController extends Controller
{
    //  ver los vehiculos disponible para asignar
    public function index()
      {
        $vehiculo=DB::select('SELECT v.id,v.nombre_img,v.estadoVeh,v.semaforo,v.nPlaca,mo.nomModelo
        from vehiculos v,modelos mo
        where v.idModelo=mo.id and v.estadoVeh=1 ');

        $asignados=\Kairos\AsignarMotVeh::Asigna();

        return View('asignar.indexVehiculo',compact('vehiculo','asignados'));
      }

      /**
       * Show the form for creating a new resource.
       *
       * @return \Illuminate\Http\Response
       */

       //  ver toda los vehiculos que han sido asignados
      public function create()
      {
        $asignado=\Kairos\AsignarMotVeh::All();
        return View('asignar.VehiculoAsignado',compact('asignado'));
      }

      /**
       * Store a newly created resource in storage.
       *
       * @param  \Illuminate\Http\Request  $request
       * @return \Illuminate\Http\Response
       */

       //  se registra la asignacion
      public function store(Request $request)
      {
        AsignarMotVeh::create([
          'idMotorista'=>$request['idMotorista'],
          'idVehiculo'=> $request['idVehiculo'],
          'fechaInicio'=>$request['fechaInicio'],
          'fechaFin'=>$request['fechaInicio'],
          'unidad'=>$request['unidad'],
          'observacionAsiV'=>$request['observacionAsiV'],
        ]);
        $v= Vehiculo::find($request['idVehiculo']);
        $mo= Motorista::find($request['idMotorista']);
        Bitacora::bitacora("Nueva Asignación del Vehiculo : ".$v->nPlaca." al Motorista ".$mo->nombresMot." ".$mo->apellidosMot);
        
        return redirect('/asignarMotVeh');
      }

      /**
       * Display the specified resource.
       *
       * @param  int  $id
       * @return \Illuminate\Http\Response
       */

       // metodo que lleva a la vista para asignar vehiculo
      public function show($id)
      {
        $vehiculo =Vehiculo::find($id);
        $motorista=Motorista::where('estadoMot',1)->where('tipoMot','Motorista')->get();
        $asignados=\Kairos\AsignarMotVeh::where('estadoAsignacion',1)->get();
        return view('asignar.showVehiculo',compact('vehiculo','motorista','asignados'));
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

       // se finaliza la asignacion
      public function update(Request $request, $id)
      {
          $cc = AsignarMotVeh::find($id);
          $idV=$cc->idVehiculo; //obtener id del vehiculo asignado
          $v= Vehiculo::find($idV); //buscar en la tabla vehiculos

          $aux=$request['bandera'];
          if ($aux=='1') {
              date_default_timezone_set("America/El_Salvador");
              $date = Carbon::now();//captura la fecha actual
              $cc->fechaFin=$date;
              $cc->estadoAsignacion=false; //se vuelve a habilitar el vehiculo

              $mo= Motorista::find($cc->idMotorista);
              Bitacora::bitacora("Asignación finalizada del Vehiculo : ".$v->nPlaca." al Motorista ".$mo->nombresMot." ".$mo->apellidosMot);
          }
          $cc->save();
          $v->save(); //se guarda los cambios en la tabla vehiculos
          Session::flash('mensaje','¡Registro Actualizado!');
          return redirect::to('/asignarMotVeh/create')->with('message','update');
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
      public function filtroVMA()
    {
      return view('reportes.FiltroVMA');
    }
      public function reporte(Request $request)
     {
      $fch1=$request->fechaInicial;
      $fch2=$request->fechaFinal;

        $asignado=\Kairos\AsignarMotVeh::whereDate('fechaInicio', '>=' , $fch1)->whereDate('fechaFin', '<=', $fch2)->get();
        $asignadoM=\Kairos\AsignarMotMaq::whereDate('fechaInicio', '>=' , $fch1)->whereDate('fechaFin', '<=', $fch2)->get();
        $date = date('d-m-Y');
        $date1 = date('g:i:s a');
        $vistaurl="reportes.reporteVMA";
        $view =  \View::make($vistaurl, compact('asignado','asignadoM','date','date1','fch1','fch2'))->render();
        $pdf = \App::make('dompdf.wrapper');
        $pdf->loadHTML($view);
        $pdf->setPaper('A4', 'landscape');
        return $pdf->stream('Vehiculo-Maquinaria Asignada '.$date.'.pdf');
    }
}
