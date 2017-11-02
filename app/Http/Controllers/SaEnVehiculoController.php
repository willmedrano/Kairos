<?php

namespace Kairos\Http\Controllers;

use Illuminate\Http\Request;
use Session;
use Redirect;
use DB;
use Input;
use Kairos\BarrioCanton;
use Kairos\AsignarMotVeh;
use Kairos\Actividad;
use Kairos\SaEnVehiculo;
use Kairos\Vehiculo;
use Kairos\ValesCombustible;

use Carbon\Carbon;
class SaEnVehiculoController extends Controller
{
    //
    //
     /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
 
   
    public function index()
    {
        //
        $cc=SaEnVehiculo::disponibles();
      return view('SaEnVehiculo.index',compact('cc'));
       
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

      $asignado=\Kairos\AsignarMotVeh::disponibles();
      $actividad= Actividad::Act();
       $cc=SaEnVehiculo::disponibles();
       $c=SaEnVehiculo::All();

       $nuevo=$c->last()->id;

       return view('SaEnVehiculo.frmSaEnVehiculo',compact('asignado','actividad','nuevo'));

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        
        $cc=SaEnVehiculo::All();
        $nuevo2=$cc->last()->id;
        
        if($request['nuevo']==$nuevo2)
        {
        ValesCombustible::create([]);
        $ids;
        $gAux =ValesCombustible::All();
        foreach ($gAux as $valor2) {
            $ids=$valor2->id;
        }
        SaEnVehiculo::create([
            'idAsignacion'=>$request['selectMarca'],
            'idVale'=>$ids,
            'idActividad'=>$request['idActividad'],
            'fecha'=>$request['fecha'],
            'kilometrajeS'=>$request['kilometrajeS'],
            'tanqueS'=>1,
            'tipo'=>1,  //recordatorio quitar esto de la tabla la proxima vez
            'lugarCarga'=>1, //recordatorio quitar esto de la tabla la proxima vez
            'horaSalida'=>$request['horaS'],
            'observacionS'=>$request['observacionesS'],
            'observacionE'=>"",
            
            
        
        ]);
        $var=AsignarMotVeh::find($request['selectMarca']);
        $v=Vehiculo::find($var->idVehiculo);
        $v->semaforo=3;
        $v->save();
        }
        return redirect('/salidaEntrada')->with('message','create');
       
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
       
       
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
      
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
        //
        
        $cc = SaEnVehiculo::find($id);
        $aux=$request['bandera'];
        
        $var=AsignarMotVeh::find($cc->idAsignacion);
        $v=Vehiculo::find($var->idVehiculo);
        
        $v->semaforo=1;
        $v->save();
        if ($aux=='1') {
            
            $cc->horaEntrada=$request['horaS'];
            $cc->kilometrajeE=$request['kilometrajeS'];
            $cc->observacionE=$request['observacionesE'];
            $cc->estado=true;
            
        }
       
        $cc->save();

        Session::flash('mensaje','¡Registro Actualizado!');
        return redirect::to('/salidaEntrada')->with('message','update');
       
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
   public function modelo($marca){
     $var=AsignarMotVeh::find($marca);
        $modeloArray=Vehiculo::where('id', '=', $var->idVehiculo)->get();
        return Response::json($modeloArray);
    }
    public function reporte(Request $request)//reporte Mttn Correctivo general
    {

      $fch1=$request->fechaInicial;
      $fch2=$request->fechaFinal;

      $cc=SaEnVehiculo::disponiblesF($fch1,$fch2);


      $date = date('d-m-Y');
      $date1 = date('g:i:s a');
      $vistaurl="reportes.reporteEntradaV";
      $view =  \View::make($vistaurl, compact('cc','date','date1','fch1','fch2'))->render();
      $pdf = \App::make('dompdf.wrapper');
      $pdf->loadHTML($view);
      $pdf->setPaper('A4', 'landscape');
      return $pdf->stream('salida Entrada de vehiculo'.$date.'.pdf');
    }
    public function filtroSa()
    {
      return view('reportes.FiltroSalidas');
    }
    public function bitacora()
    {
        $cc=\Kairos\bitacora::barCan();
      return view('bitacora.bitacora',compact('cc'));
    }
}
