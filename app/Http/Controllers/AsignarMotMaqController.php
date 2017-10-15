<?php

namespace Kairos\Http\Controllers;

use Illuminate\Http\Request;
use Session;
use Redirect;
use Response;
use DB;
use Kairos\Maquinaria;
use Kairos\Marca;
use Kairos\TipoVmq;
use Kairos\Motorista;
use Kairos\AsignarMotMaq;
use Carbon\Carbon;

class AsignarMotMaqController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    //  ver la maquinaria disponible para asignar
    public function index()
    {
      $maquinaria=DB::select('SELECT m.id,m.nombre_img,m.estadoMaq,m.semaforo,m.nEquipo,mo.nomModelo
      from maquinarias m,modelos mo
      where m.idModelo=mo.id and m.estadoMaq=1 ');
      $asignados=\Kairos\AsignarMotMaq::Asigna();
      return View('asignar.indexMaquinaria',compact('maquinaria','asignados'));
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    //  ver toda la maquinaria que ha sido asignada
    public function create()
    {
      $asignado=\Kairos\AsignarMotMaq::All();
      return View('asignar.maquinariaAsignada',compact('asignado'));
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
      AsignarMotMaq::create([
        'idMotorista'=>$request['idMotorista'],
        'idMaquinaria'=> $request['idMaquinaria'],
        'fechaInicio'=>$request['fechaInicio'],
        'fechaFin'=>$request['fechaInicio'],
        'unidad'=>$request['unidad'],
        'observacionAsiM'=>$request['observacionAsiM'],
      ]);
      
      return redirect('/asignarMotMaq');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    // metodo que lleva a la vista para asignar maquinaria
    public function show($id)
    {
      $maquinaria =Maquinaria::find($id);
      $motorista=Motorista::where('estadoMot',1)->where('tipoMot','Operario')->get();
      $asignados=\Kairos\AsignarMotMaq::where('estadoAsignacionMaq',1)->get();
      return view('asignar.showMaquinaria',compact('maquinaria','motorista','asignados'));
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
      $cc = AsignarMotMaq::find($id);
      $idM=$cc->idMaquinaria; //obtener id de la maquinaria asignado
      $m= Maquinaria::find($idM); //buscar en la tabla maquinarias

      $aux=$request['bandera'];
      if ($aux=='1') {
          date_default_timezone_set("America/El_Salvador");
          $date = Carbon::now();//captura la fecha actual
          $cc->fechaFin=$date;
          $cc->estadoAsignacionMaq=false; //se vuelve a habilitar el vehiculo
          //$m->semaforo=1; //semaforo pasa a disponible
      }
      $cc->save();
      $m->save(); //se guarda los cambios en la tabla maquinarias
      Session::flash('mensaje','¡Registro Actualizado!');
      return redirect::to('/asignarMotMaq/create')->with('message','update');
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
}
