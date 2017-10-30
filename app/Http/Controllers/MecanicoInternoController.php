<?php

namespace Kairos\Http\Controllers;

use Illuminate\Http\Request;
use Kairos\MecanicoInterno;
use Kairos\Bitacora;
use Session;
use Redirect;
use Input;
use Carbon\Carbon;

class MecanicoInternoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $mecanico=\Kairos\MecanicoInterno::where('idTaller',1)->get();
      return view('mecanicoI.index',compact('mecanico'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('mecanicoI.frmMecanicoInterno');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      //obtenemos el campo file definido en el formulario
      $file = Input::file('nombre_img');
       //Creamos una instancia de la libreria instalada
       $image = \Image::make(\Input::file('nombre_img'));
       //Ruta donde queremos guardar las imagenes
       $path = public_path().'/imagenesMecanico/';
       // Guardar Original
       $image->save($path.$file->getClientOriginalName());

      MecanicoInterno::create([
        'nombresMec'=>$request['nombresMec'],
        'apellidosMec'=> $request['apellidosMec'],
        'direccionMec'=>$request['direccionMec'],
        'sexo'=>$request['sexo'],
        'telefonoMec'=>$request['telefonoMot'],
        'DUI'=>$request['DUI'],
        'fechaNacimiento'=>$request['fechaNacimiento'],
        'fechaContrato'=>$request['fechaContrato'],
        'fechaDespido'=>$request['fechaContrato'],
        'nombre_img'=>$file->getClientOriginalName(),
        'observacionMec'=>$request['observacionMec'],
        'idTaller'=>1,
      ]);
      Bitacora::bitacora("Registro de nuevo Mecanico: ".$request['nombresMec']." ".$request['apellidosMec']);
      return redirect('/mecanicoI')->with('create','• Sea creado con éxito el registro');
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
      $m= MecanicoInterno::find($id);

      if($aux=='2')
        {
            $m->fechaDespido=$m->fechaContrato;
            $m->estadoMec =true;
            Bitacora::bitacora("Activo al Mecanico: ".$m->nombresMec." ".$m->apellidosMec);
            Session::flash('mensaje','• Mecánico Activado correctamente');
        }
        else if($aux=='3')
        {
            date_default_timezone_set("America/El_Salvador");
            $date = Carbon::now();
            $m->fechaDespido=$date;
            $m->estadoMec =false;
            Bitacora::bitacora("Desactivo al Mecanico: ".$m->nombresMec." ".$m->apellidosMec);
            Session::flash('mensaje','• Mecánico Desactivado correctamente');
        }
        else if($aux=='4'){
            $file = Input::file('nombre_img');
           //Creamos una instancia de la libreria instalada
           $image = \Image::make(\Input::file('nombre_img'));
           //Ruta donde queremos guardar las imagenes
           $path = public_path().'/imagenesMecanico/';
           // Guardar Original
           $image->save($path.$file->getClientOriginalName());
           $m->nombre_img=$file->getClientOriginalName();
           Bitacora::bitacora("Actualizo la foto del Mecanico: ".$m->nombresMec." ".$m->apellidosMec);
        }

else{

       $m->nombresMec=$request['nombresMec'];
       $m->apellidosMec=$request['apellidosMec'];
       $m->direccionMec=$request['direccionMec'];
       $m->sexo=$request['sexo'];
       $m->telefonoMec=$request['telefonoMot'];
       $m->DUI=$request['DUI'];
       $m->fechaNacimiento=$request['fechaNacimiento'];
       $m->fechaContrato=$request['fechaContrato'];
       $m->observacionMec=$request['observacionMec'];
       Bitacora::bitacora("Actualizo datos al Mecanico: ".$m->nombresMec." ".$m->apellidosMec);
       Session::flash('update','• Mecánico editado correctamente');

}
      $m->save();
      return Redirect::to('/mecanicoI');

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
