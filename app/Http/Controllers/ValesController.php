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
class ValesController extends Controller
{
    //
    public function index()
    {
    	
        $cc=ValesCombustible::disponiblesVA(2);
        $cc1=ValesCombustible::disponiblesMA(2);
        $cc2=ValesCombustible::disponiblesCA(2);


      return view('Vales.valeAgricola',compact('cc','cc1','cc2'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $cc=SaEnVehiculo::disponibles();
        $cc1=SaEnMaquinaria::disponibles();
        $cc2=SaEnCamion::disponibles();


      return view('Vales.ValeTodos',compact('cc','cc1','cc2'));

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
        

      return view('Vales.valeVehiculos',compact('cc','v'));
       
       
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
        

      return view('Vales.valeMaquinaria',compact('cc','v'));
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
        $bandera=$request['bandera'];
        if($bandera==1)
        {
            $saen=SaEnVehiculo::where('idVale',$id)->get();
        }
        else{
            $saen=SaEnMaquinaria::where('idVale',$id)->get();
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
            $cc->estadoVale=true;    
            $cc->save();

        Session::flash('mensaje','¡Registro Actualizado!');
        if($bandera==1)
        {
           return redirect::to('/salidaEntrada')->with('message','update');
        }
        else{
            return redirect::to('/salidaEntrada2')->with('message','update');
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
}
