<?php

namespace Kairos\Http\Controllers;
use Illuminate\Http\Request;
use Session;
use Redirect;
use DB;
use Input;
use Kairos\BarrioCanton;
use Kairos\SaEnVehiculo;
use Kairos\SaEnMaquinaria;
use Kairos\SaEnCamion;
use Kairos\ValesCombustible;
use Carbon\Carbon;
use Kairos\Vehiculo;
use Kairos\Maquinaria;
use Kairos\Http\Requests\ValeRequest;
class ValesCombustibleController extends Controller
{
    //
     public function index()
    {
         $vehiculo=DB::select('SELECT v.id,v.nombre_img,v.estadoVeh,v.semaforo,v.nPlaca,mo.nomModelo
        from vehiculos v,modelos mo
        where v.idModelo=mo.id');

        
       
         
         return View('Vales.vehiculo',compact('vehiculo'));

         
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       $maquinaria=DB::select('SELECT m.id,m.nombre_img,m.estadoMaq,m.semaforo,m.nInventario,m.nEquipo,mo.nomModelo
      from maquinarias m,modelos mo
      where m.idModelo=mo.id');
      
      return View('Vales.maquinaria',compact('maquinaria'));

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
       /*  $vehiculo =Vehiculo::find($id);
        $motorista=Motorista::where('estadoMot',1)->where('tipoMot','Motorista')->get();
        $asignados=\Kairos\AsignarMotVeh::where('estadoAsignacion',1)->get();*/
        $v =Vehiculo::find($id);
        $cc=ValesCombustible::disponibles($id);
        $cc2=ValesCombustible::disponiblesC($id);
        $cc3=ValesCombustible::ALl();

      return view('Vales.valeVehiculos',compact('cc','cc2','v','cc3'));
       
       
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
      $v =Maquinaria::find($id);
      $cc=ValesCombustible::disponiblesM($id);
        $cc2=ValesCombustible::ALl();

      return view('Vales.valeMaquinaria',compact('cc','v','cc2'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ValeRequest $request, $id)
    {
        //
        $bandera=$request['bandera'];
        if($bandera==1)
        {
            $saen=SaEnVehiculo::where('idVale',$id)->get();
        }
        if($bandera==2){
            $saen=SaEnMaquinaria::where('idVale',$id)->get();
        }
        if($bandera==3){
            $saen=SaEnCamion::where('idVale',$id)->get();
        }

        foreach ($saen as $key) {

            # code...
            $ids=$key->idVale;
        }

        $cc = ValesCombustible::find($ids);
        
       
            $cc->nVale=$request['nVale'];
            $cc->tipo=$request['tipo'];
            $cc->galones=$request['galones'];
            $cc->PrecioU=$request['PrecioU'];
            $cc->total=$request['total'];
            $cc->estadoVale=true;    
            $cc->save();
            \Kairos\Bitacora::bitacora("Se Asigno el vale de combustible # ".$request['nVale']);
        

        Session::flash('mensaje','¡Registro Actualizado!');
        if($bandera==1)
        {
           return redirect::to('/salidaEntrada')->with('message','update');
        }
        if($bandera==2){
            return redirect::to('/salidaEntrada2')->with('message','update');
        }
        if($bandera==3){
            return redirect::to('/salidaEntrada3')->with('message','update');
        }
        
       
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

    public function llenado($buscar){
    $empleado=Motorista::where('nombresMot',$buscar)->get();
    
    
    return response()->json($empleado->toArray());
  }

  public function filtroVale()
    {
      return view('reportes.FiltroVale');
    }
    public function reporte(Request $request)//reporte Mttn Correctivo general
    {

      $fch1=$request->fechaInicial;
      $fch2=$request->fechaFinal;
      $cc=SaEnVehiculo::disponibles();
        $cc1=SaEnMaquinaria::disponibles();
        $cc2=SaEnCamion::disponibles();
      $cc3=ValesCombustible::whereDate('updated_at', '>=' , $fch1)->whereDate('updated_at', '<=', $fch2)->get();
      
     

      $date = date('d-m-Y');
      $date1 = date('g:i:s a');
      $vistaurl="reportes.ReporteValexF";
     $view =  \View::make($vistaurl, compact('cc','cc1','cc2','cc3','date','date1','fch1','fch2'))->render();
      $pdf = \App::make('dompdf.wrapper');
      $pdf->loadHTML($view);
      $pdf->setPaper('A4', 'landscape');
      return $pdf->stream('Vales vehiculo '.$date.'.pdf');
    }

    public function valeXV(Request $request)//reporte Mttn C x VM
    {

      $fch1=$request->fechaInicial;
      $fch2=$request->fechaFinal;
      $opcion=$request->idV;
      $v =Vehiculo::find($opcion);
        $cc=ValesCombustible::disponiblesR($opcion,$fch1,$fch2);
        $cc2=ValesCombustible::disponiblesCR($opcion,$fch1,$fch2);
        $cc3=ValesCombustible::ALl();
          $date = date('d-m-Y');
          $date1 = date('g:i:s a');
          $vistaurl="reportes.reporteValeXV";
          $opc=1;
          $view =  \View::make($vistaurl, compact('cc','cc2','v','cc3','date','date1','fch1','fch2'))->render();
          $pdf = \App::make('dompdf.wrapper');
          $pdf->loadHTML($view);
          $pdf->setPaper('A4', 'landscape');
          return $pdf->stream('Mttn Correctivo por Vehiculo '.$date.'.pdf');
      

    }
    public function valeXM(Request $request)//reporte Mttn C x VM
    {

      $fch1=$request->fechaInicial;
      $fch2=$request->fechaFinal;
      $opcion=$request->idV;
        $v =Maquinaria::find($opcion);
      $cc=ValesCombustible::disponiblesMR($opcion,$fch1,$fch2);
        $cc2=ValesCombustible::ALl();
          $date = date('d-m-Y');
          $date1 = date('g:i:s a');
          $vistaurl="reportes.reporteValeXM";
          $opc=1;
          $view =  \View::make($vistaurl, compact('cc','v','cc2','date','date1','fch1','fch2'))->render();
          $pdf = \App::make('dompdf.wrapper');
          $pdf->loadHTML($view);
          $pdf->setPaper('A4', 'landscape');
          return $pdf->stream('Vale por maquinaria '.$date.'.pdf');
    }
    public function valeXA(Request $request)//reporte Mttn C x VM
    {

      $fch1=$request->fechaInicial;
      $fch2=$request->fechaFinal;
      
      $cc=ValesCombustible::disponiblesVAR(2,$fch1,$fch2);
        $cc1=ValesCombustible::disponiblesMAR(2,$fch1,$fch2);
        $cc2=ValesCombustible::disponiblesCAR(2,$fch1,$fch2);
        $cc3=ValesCombustible::All();
        
        
          $date = date('d-m-Y');
          $date1 = date('g:i:s a');
          $vistaurl="reportes.reporteValeXA";
          $opc=1;
          $view =  \View::make($vistaurl, compact('cc','cc1','cc2','cc3','date','date1','fch1','fch2'))->render();
          $pdf = \App::make('dompdf.wrapper');
          $pdf->loadHTML($view);
          $pdf->setPaper('A4', 'landscape');
          return $pdf->stream('Vale por actividad agricola '.$date.'.pdf');
    }
    

    public function reporteAll(Request $request)//reporte Mttn Correctivo general
    {

       $cc=SaEnVehiculo::disponibles();
        $cc1=SaEnMaquinaria::disponibles();
        $cc2=SaEnCamion::disponibles();
         $cc3=ValesCombustible::All();

      $date = date('d-m-Y');
      $date1 = date('g:i:s a');
      $vistaurl="reportes.ReporteVale";
      $view =  \View::make($vistaurl, compact('cc','cc1','cc2','cc3','date','date1'))->render();
      $pdf = \App::make('dompdf.wrapper');
      $pdf->loadHTML($view);
      $pdf->setPaper('A4', 'landscape');
      return $pdf->stream('Vales vehiculo '.$date.'.pdf');
    }
}
