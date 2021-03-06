<?php

namespace Kairos\Http\Controllers;

use Illuminate\Http\Request;
use Session;
use Redirect;
use DB;
use Input;
use Response;
use Kairos\BarrioCanton;
use Kairos\ColoniaCaserio;
use Kairos\AsignarMotMaq;
use Kairos\Actividad;
use Kairos\SaEnMaquinaria;
use Kairos\Maquinaria;
use Maatwebsite\Excel\Facades\Excel;
use Kairos\ValesCombustible;

use Carbon\Carbon;
class SaEnMaquinariaController extends Controller
{
    //
      public function index()
    {
        //
        $cc=SaEnMaquinaria::disponibles();
        foreach ($cc as $c) {
        $c->idUbc=SaEnMaquinaria::caserio($c->idUbc);
        $caserio=ColoniaCaserio::find($c->idUbc2);
        $canton=BarrioCanton::find($caserio->idCC);
        $c->idUbc2=$canton->nombre.", ".$caserio->nombre;
         
       }
      return view('SaEnMaquinaria.index',compact('cc'));
       
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      $asignado=\Kairos\AsignarMotMaq::disponibles();
      $actividad= Actividad::Act2();
      $BC=BarrioCanton::All();
       return view('SaEnMaquinaria.frmSaEnVehiculo',compact('asignado','actividad','BC'));

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

        ValesCombustible::create([]);
        $ids;
        $gAux =ValesCombustible::All();
        foreach ($gAux as $valor2) {
            $ids=$valor2->id;
        }
        SaEnMaquinaria::create([
            'idAsignacion'=>$request['selectMarca'],
            'idVale'=>$ids,
            'idActividad'=>$request['idActividad'],
            'idUbc'=>$request['idUbc'],
            'idUbc2'=>$request['idUbc2'],
            'fecha'=>$request['fecha'],
            'horasM'=>0,
            'tanqueS'=>1,
            // esto se debe quitar longitud
            'horaSalida'=>$request['horaS'],
            'observacionS'=>$request['observacionesS'],
            'observacionE'=>"",
            
            
        
        ]);
        $var=AsignarMotMaq::find($request['selectMarca']);
        $v=Maquinaria::find($var->idMaquinaria);
        $v->semaforo=3;
        \Kairos\Bitacora::bitacora("Se registro la salida de  maquinaria con el numero de equipo : ".$v->nEquipo);
        $v->save();
        return redirect('/salidaEntrada2')->with('message','create');
       
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
    public function edit($id) //completadas
    {
      $cc=SaEnMaquinaria::completadas();
        foreach ($cc as $c) {
        $c->idUbc=SaEnMaquinaria::caserio($c->idUbc);
        $caserio=ColoniaCaserio::find($c->idUbc2);
        $canton=BarrioCanton::find($caserio->idCC);
        $c->idUbc2=$canton->nombre.", ".$caserio->nombre;
         
       }
      return view('SaEnMaquinaria.index',compact('cc'));
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
        
        $cc = SaEnMaquinaria::find($id);
        $aux=$request['bandera'];
        
        $var=AsignarMotMaq::find($cc->idAsignacion);
        $v=Maquinaria::find($var->idMaquinaria);
        
        $v->semaforo=1;
        $v->horaAux=$v->horaAux+$request['kilometrajeS'];
        $v->save();
        if ($aux=='1') {
            
            $cc->horaEntrada=$request['horaS'];
            $cc->horasM=$request['kilometrajeS'];
            $cc->observacionE=$request['observacionesE'];
            $cc->horaExtra=$request['horaExtra'];
            $cc->longitud=$request['long'];
            $cc->estado=true;
            
        }
        \Kairos\Bitacora::bitacora("Se registro la entrada de maquinaria con el numero de equipo : ".$v->nEquipo);
        $cc->save();

        Session::flash('mensaje','¡Registro Actualizado!');
        return redirect::to('/salidaEntrada2')->with('message','update');
       
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
    public function nuevo($marca){
        $nuevo=BarrioCanton::find($marca);
        $modeloArray=ColoniaCaserio::where('idCC', '=', $nuevo->id)->get();
        return Response::json($modeloArray);
    }

   public function modelo($marca){
     $var=AsignarMotMaq::find($marca);
        $modeloArray=Maquinaria::where('id', '=', $var->idMaquinaria)->get();
        return Response::json($modeloArray);
    }
    public function reporte(Request $request)//reporte Mttn Correctivo general
    {

      $fch1=$request->fechaInicial;
      $fch2=$request->fechaFinal;

      $cc=SaEnMaquinaria::disponiblesF($fch1,$fch2);

foreach ($cc as $c) {
        $c->idUbc=SaEnMaquinaria::caserio($c->idUbc);
   
         
       }
      $date = date('d-m-Y');
      $date1 = date('g:i:s a');
      $vistaurl="reportes.reporteEntradaM";
      $view =  \View::make($vistaurl, compact('cc','date','date1','fch1','fch2'))->render();
      $pdf = \App::make('dompdf.wrapper');
      $pdf->loadHTML($view);
      $pdf->setPaper('A4', 'landscape');
      return $pdf->stream('salida Entrada de vehiculo'.$date.'.pdf');
    }
      public function reporte2(Request $request)//reporte Mttn C x VM
    {

      $fch1=$request->fechaInicial;
      $fch2=$request->fechaFinal;
      $opcion=$request->idV;
      $v =Maquinaria::find($opcion);
        $cc=ValesCombustible::disponiblesMR($opcion,$fch1,$fch2);
      foreach ($cc as $c) {
        $c->idUbc=SaEnMaquinaria::caserio($c->idUbc);
        $caserio=ColoniaCaserio::find($c->idUbc2);
        $canton=BarrioCanton::find($caserio->idCC);
        $c->idUbc2=$canton->nombre.", ".$caserio->nombre;
         
       }
          $date = date('d-m-Y');
          $date1 = date('g:i:s a');
          $vistaurl="reportes.reporteEntradaXM";
          $opc=1;
          $view =  \View::make($vistaurl, compact('cc','v','date','date1','fch1','fch2'))->render();
          $pdf = \App::make('dompdf.wrapper');
          $pdf->loadHTML($view);
          $pdf->setPaper('A4', 'landscape');
          return $pdf->stream('Salidas y entradas por maquinaria '.$date.'.pdf');
      

    }
    
    public function Excel(Request $request)//reporte Mttn Correctivo general
    {

       $fch1=$request->fechaInicial;
      $fch2=$request->fechaFinal;

      $cc=SaEnMaquinaria::disponiblesF($fch1,$fch2);      
       
    Excel::create("Salidas y entradas de Maquinaria", function ($excel) use ($cc) {
        $excel->setTitle("Title");
        $excel->sheet("Hoja 1", function ($sheet) use ($cc) {
            
            $sheet->loadView('SaEnMaquinaria.excel')->with('cc', $cc);;
        });
    })->download('xlsx');
    }
      public function Excel2(Request $request)//reporte Mttn Correctivo general
    {
       $fch1=$request->fechaInicial;
      $fch2=$request->fechaFinal;
      $dF =date("d-m-Y", strtotime("$fch2"));
      $dI =date("d-m-Y", strtotime("$fch1"));
      $opcion=$request->idV;
      $v =Maquinaria::find($opcion);
        $cc=ValesCombustible::disponiblesMR($opcion,$fch1,$fch2);
      foreach ($cc as $c) {
        $c->idUbc=SaEnMaquinaria::caserio($c->idUbc);
        $caserio=ColoniaCaserio::find($c->idUbc2);
        $canton=BarrioCanton::find($caserio->idCC);
        $c->idUbc2=$canton->nombre.", ".$caserio->nombre;
         
       }
       $date = date('d-m-Y');
          $date1 = date('g:i:s a');
    Excel::create("Salidas y entradas del ".$v->nEquipo." del ".$dI." al ".$dF."", function ($excel) use ($cc) {
        $excel->setTitle("Title");
        $excel->sheet("Hoja 1", function ($sheet) use ($cc) {
            
            $sheet->loadView('Vales.ExcelMaquinaria')->with('cc', $cc);;
        });
    })->download('xlsx');
    }
}
