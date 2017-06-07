<?php

namespace Kairos\Http\Controllers;

use Illuminate\Http\Request;
use Session;
use Redirect;
use DB;
use Input;
use Kairos\Motorista;

class MotoristaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $motorista=\Kairos\Motorista::All();
      return view('motorista.index',compact('motorista'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('motorista.create');
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
       $path = public_path().'/imagenesMotoristas/';
       // Guardar Original
       $image->save($path.$file->getClientOriginalName());

      Motorista::create([
        'nombresMot'=>$request['nombresMot'],
        'apellidosMot'=> $request['apellidosMot'],
        'direccionMot'=>$request['direccionMot'],
        'sexo'=>$request['sexo'],
        'telefonoMot'=>$request['telefonoMot'],
        'DUI'=>$request['DUI'],
        'licencia'=>$request['licencia'],
        'fechaNacimiento'=>$request['fechaNacimiento'],
        'fechaContrato'=>$request['fechaContrato'],
        'fechaDespido'=>$request['fechaNacimiento'],
        'nombre_img'=>$file->getClientOriginalName(),
      ]);
      return redirect('/motorista');
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
      // $motorista=DB::select('SELECT * FROM motoristas where idMotorista','=',$id);
      $motorista=Motorista::find($id);

      return view('motorista.edit',compact('motorista'));
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
      $motorista= Motorista::find($id);

      if($aux=='2')
        {
            $motorista->estadoMot =true;
        }
        else if($aux=='3')
        {
            $motorista->estadoMot =false;
        }

else{
       $motorista->nombresMot=$request['nombresMot'];
       $motorista->apellidosMot=$request['apellidosMot'];
       $motorista->direccionMot=$request['direccionMot'];
       $motorista->sexo=$request['sexo'];
       $motorista->telefonoMot=$request['telefonoMot'];
       $motorista->DUI=$request['DUI'];
       $motorista->licencia=$request['licencia'];
       $motorista->fechaNacimiento=$request['fechaNacimiento'];
       $motorista->fechaContrato=$request['fechaContrato'];
}
      $motorista->save();
      return Redirect::to('/motorista');

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
