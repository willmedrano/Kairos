<?php

namespace Kairos\Http\Controllers;

use Illuminate\Http\Request;
use Kairos\TallerE;
use Kairos\MecanicoInterno;
use Kairos\Bitacora;
use Redirect;
use Session;
use Kairos\Http\Requests\TallerRequest;

class TallerExternoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $taller=\Kairos\TallerE::where('estadoTE',1)->get();
      return view('tallerExterno.index',compact('taller'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('tallerExterno.frmTallerExterno ');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(TallerRequest $request)
    {
      TallerE::create([
      'nomTallerE'=>$request['nomTallerE'],
      'responsable'=>$request['responsable'],
      'direccionTE'=>$request['direccionTE'],
      'telefonoTE'=>$request['telefonoTE'],
      'celTE'=>$request['celTE'],
    ]);
      Bitacora::bitacora("Registro de nuevo Taller: ".$request['nomTallerE']);

      $idT=TallerE::All();
      $id=$idT->last()->id;
      
      MecanicoInterno::create([
        'nombresMec'=>$request['responsable'],
        'apellidosMec'=>' ',
        'direccionMec'=>$request['direccionTE'],
        'sexo'=>'M',
        'telefonoMec'=>$request['telefonoTE'],
        'DUI'=>'0000000 ',
        'fechaNacimiento'=>'2017-10-24 ',
        'fechaContrato'=>'2017-10-24 ',
        'fechaDespido'=>'2017-10-24 ',
        'nombre_img'=>'hola ',
        'observacionMec'=>'nada ',
        'idTaller'=>$id,
    ]);
    return redirect('/tallerE')->with('create','• Taller ingresado correctamente');
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
      $aux=$request['hi2'];
      $t= TallerE::find($id);
      $ta=$t->nomTallerE;
      if($aux=='1')
        {
          $t->nomTallerE=$request['nomTallerE'];
          $t->responsable=$request['responsable'];
          $t->direccionTE=$request['direccionTE'];
          $t->telefonoTE=$request['telefonoTE'];
          $t->celTE=$request['celTE'];
          Bitacora::bitacora("Datos actualizado de : ".$ta);
          Session::flash('update','• Sea actualizado con éxito el registro');

        }
        else if ($aux=='2') {
          $t->estadoTE=true;
          Bitacora::bitacora("Activo al: ".$ta);
          Session::flash('mensaje','• Taller Activado correctamente');
        }else{
          $t->estadoTE =false;
          Bitacora::bitacora("Desactivo al: ".$ta);
          Session::flash('mensaje','• Taller Desactivado correctamente');
      }
        $t->save();
        return Redirect::to('/tallerE');
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
    public function activo($id)
    {
      $taller=\Kairos\TallerE::where('estadoTE',1)->get();
      return view('tallerExterno.index',compact('taller'));
    }
    public function desactivo($id)
    {
      $taller=\Kairos\TallerE::where('estadoTE',0)->get();
      return view('tallerExterno.index',compact('taller'));
    }


}
