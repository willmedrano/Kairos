<?php

namespace Kairos\Http\Controllers;

use Illuminate\Http\Request;
use Session;
use Redirect;
use DB;
use Input;
use Kairos\BarrioCanton;
use Kairos\AsignarMotMaq;
use Kairos\Actividad;
use Kairos\SaEnMaquinaria;
use Kairos\Maquinaria;
use Kairos\ValesCombustible;

use Carbon\Carbon;
class SaEnMaquinariaController extends Controller
{
    //
      public function index()
    {
        //
        $cc=SaEnMaquinaria::disponibles();
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
      $actividad= Actividad::Act();
       return view('SaEnMaquinaria.frmSaEnVehiculo',compact('asignado','actividad'));

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
            'fecha'=>$request['fecha'],
            'horasM'=>0,
            'tanqueS'=>1,
            'tipoSalida'=>$request['tipoSalida'],
            'horaSalida'=>$request['horaS'],
            'observacionS'=>$request['observacionesS'],
            'observacionE'=>"",
            
            
        
        ]);
        $var=AsignarMotMaq::find($request['selectMarca']);
        $v=Maquinaria::find($var->idMaquinaria);
        $v->semaforo=3;
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
            $cc->estado=true;
            
        }
       
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
   public function modelo($marca){
     $var=AsignarMotMaq::find($marca);
        $modeloArray=Maquinaria::where('id', '=', $var->idMaquinaria)->get();
        return Response::json($modeloArray);
    }
}
