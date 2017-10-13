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

class SaEnCamionController extends Controller
{
    //
     public function index()
    {
        //
        $cc=SaEnVehiculo::disponibles();
      return view('SaEnCamion.index',compact('cc'));
       
        
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
       return view('SaEnCamion.frmSaEnVehiculo',compact('asignado','actividad'));

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
        SaEnCamion::create([
            'idAsignacion'=>$request['selectMarca'],
            'idVale'=>$ids,
            'idActividad'=>$request['idActividad'],
            'fecha'=>$request['fecha'],
            'kilometrajeS'=>$request['kilometrajeS'],
            'tanqueS'=>1,
            'horaSalida'=>$request['horaS'],
            'observacionS'=>$request['observacionesS'],
            'observacionE'=>"",
            
            
        
        ]);
        $var=AsignarMotVeh::find($request['selectMarca']);
        $v=Vehiculo::find($var->idVehiculo);
        $v->semaforo=3;
        $v->save();
        return redirect('/salidaEntrada3')->with('message','create');
       
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
        
        $cc = SaEnCamion::find($id);
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
        return redirect::to('/salidaEntrada3')->with('message','update');
       
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
}
