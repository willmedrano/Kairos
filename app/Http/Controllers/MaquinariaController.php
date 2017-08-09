<?php

namespace Kairos\Http\Controllers;
use Session;
use Redirect;
use Input;
use Response;
use Kairos\Maquinaria;
use Kairos\TipoVmq;
use Kairos\Modelo;
use Kairos\Marca;
use Illuminate\Http\Request;

class MaquinariaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $maquinaria=\Kairos\Maquinaria::All();
      $marca=\Kairos\Marca::All();
      $tipo=\Kairos\TipoVmq::All();
      return View('maquinaria.index',compact('maquinaria','marca','tipo'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      $tipo=TipoVmq::All();
      $modelo=Modelo::All();
      $marca=Marca::All();
      return view('maquinaria.frmMaquinaria',compact('tipo','modelo','marca'));

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
       $path = public_path().'/imagenesMaquinaria/';
       // Guardar Original
       $image->save($path.$file->getClientOriginalName());

      Maquinaria::create([
        'idTipo'=>$request['idTipo'],
        'idModelo'=> $request['idModelo'],
        'color'=>$request['color'],
        'anio'=>$request['anio'],
        'nEquipo'=>$request['nEquipo'],
        'nInventario'=>$request['nInventario'],
        'horaM'=>$request['horaM'],
        'nombre_img'=>$file->getClientOriginalName(),
      ]);
      return redirect('/maquinaria')->with('create','• Maquinaria ingresada correctamente');
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
      $m= Maquinaria::find($id);

      if($aux=='2')
        {
            $m->estadoMaq =true;
            Session::flash('mensaje','• Maquinaria Activada correctamente');

        }
        else if($aux=='3')
        {
            $m->estadoMaq =false;
            Session::flash('mensaje','• Maquinaria dada de baja correctamente');

        }
        else if($aux=='4')
        {
          //obtenemos el campo file definido en el formulario
          $file = Input::file('nombre_img');
           //Creamos una instancia de la libreria instalada
           $image = \Image::make(\Input::file('nombre_img'));
           //Ruta donde queremos guardar las imagenes
           $path = public_path().'/imagenesMaquinaria/';
           // Guardar Original
           $image->save($path.$file->getClientOriginalName());

           $m->nombre_img=$file->getClientOriginalName();

        }
        else{
          $m->color=$request['color'];
          $m->anio=$request['anio'];
          $m->nEquipo=$request['nEquipo'];
          $m->nInventario=$request['nInventario'];
          Session::flash('update','• Maquinaria modificada correctamente');

      }

      $m->save();
      return Redirect::to('/maquinaria');
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
        $modeloArray=Modelo::where('idMarca', '=', $marca)->get();
        return Response::json($modeloArray);
    }
}
