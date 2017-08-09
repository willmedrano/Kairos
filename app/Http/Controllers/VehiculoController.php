<?php

namespace Kairos\Http\Controllers;
use Session;
use Redirect;
use Input;
use Response;
use Kairos\Vehiculo;
use Kairos\TipoVmq;
use Kairos\Modelo;
use Kairos\Marca;

use Illuminate\Http\Request;

class VehiculoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $vehiculo=\Kairos\Vehiculo::All();
      $marca=\Kairos\Marca::All();
      $tipo=\Kairos\TipoVmq::All();
      return View('vehiculo.index',compact('vehiculo','marca','tipo'));
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
        return view('vehiculo.frmVehiculo',compact('tipo','modelo','marca'));
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
       $path = public_path().'/imagenesVehiculos/';
       // Guardar Original
       $image->save($path.$file->getClientOriginalName());

      Vehiculo::create([
        'idTipo'=>$request['idTipo'],
        'idModelo'=> $request['idModelo'],
        'color'=>$request['color'],
        'anio'=>$request['anio'],
        'nPlaca'=>$request['nPlaca'],
        'nInventario'=>$request['nInventario'],
        'kilometraje'=>$request['kilometraje'],
        'kilometrajeM'=>$request['kilometrajeM'],
        'nombre_img'=>$file->getClientOriginalName(),
      ]);
      return redirect('/vehiculo')->with('message','create');
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
      $aux=$request['hi2'];
      $v= Vehiculo::find($id);

      if($aux=='2')
        {
            $v->estadoVeh =true;
            Session::flash('mensaje','• Vehiculo Activado correctamente');

        }
        else if($aux=='3')
        {
            $v->estadoVeh =false;
            Session::flash('mensaje','• Vehiculo dado de baja correctamente');

        }
        else if($aux=='4')
        {
          //obtenemos el campo file definido en el formulario
          $file = Input::file('nombre_img');
           //Creamos una instancia de la libreria instalada
           $image = \Image::make(\Input::file('nombre_img'));
           //Ruta donde queremos guardar las imagenes
           $path = public_path().'/imagenesVehiculos/';
           // Guardar Original
           $image->save($path.$file->getClientOriginalName());

           $v->nombre_img=$file->getClientOriginalName();

        }
        else{
          $v->color=$request['color'];
          $v->anio=$request['anio'];
          $v->nPlaca=$request['nPlaca'];
          $v->nInventario=$request['nInventario'];
          $v->kilometrajeM=$request['kilometrajeM'];
          Session::flash('update','• Sea actualizado con éxito el registro');

      }

      $v->save();
      return Redirect::to('/vehiculo');
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
