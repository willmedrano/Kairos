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
    public function index()
    {
      $maquinaria=\Kairos\Maquinaria::where('estadoMaq',1)->get();
      $marca=\Kairos\Marca::All();
      $tipo=\Kairos\TipoVmq::All();
      $asignados=\Kairos\AsignarMotMaq::Asigna();

      return View('asignar.indexMaquinaria',compact('maquinaria','marca','tipo','asignados'));
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
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
    public function store(Request $request)
    {
      AsignarMotMaq::create([
        'idMotorista'=>$request['idMotorista'],
        'idMaquinaria'=> $request['idMaquinaria'],
        'fechaInicio'=>$request['fechaInicio'],
        'fechaFin'=>$request['fechaInicio'],
      ]);
      return redirect('/asignarMotMaq');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
      $maquinaria =Maquinaria::find($id);
      $motorista=Motorista::where('estadoMot',1)->get();
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
    public function update(Request $request, $id)
    {
      $cc = AsignarMotMaq::find($id);
      $aux=$request['bandera'];
      if ($aux=='1') {
          date_default_timezone_set("America/El_Salvador");
          $date = Carbon::now();
          $cc->fechaFin=$date;
          $cc->estadoAsignacionMaq=false;

      }
      $cc->save();
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
