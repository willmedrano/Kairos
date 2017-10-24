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
}
