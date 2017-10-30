<?php

namespace Kairos\Http\Controllers;

use Illuminate\Http\Request;
use Kairos\Http\Requests\ModeloRequest;
use Kairos\Modelo;
use Kairos\Marca;
use Kairos\Bitacora;
use Redirect;
use Session;

class ModeloController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ModeloRequest $request)
    {
      Modelo::create([
      'nomModelo'=>$request['nomModelo'],
      'idMarca'=>$request['id'],
    ]);
      Bitacora::bitacora("Registro de nuevo Modelo: ".$request['nomModelo']);
    return redirect('/marca')->with('create','• Modelo ingresado correctamente');

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
      $modelo= Modelo::find($id);
      $mo=$modelo->nomModelo;
      $modelo->nomModelo=$request['nomModelo'];
      Session::flash('update','• Registro Actualizado');
      $modelo->save();
      Bitacora::bitacora("Modificación de Modelo: ".$mo);

      $aux = Modelo::where('id','=', $id)->first(); //obtener datos del modelo modificado
      $marca =Marca::find($aux->idMarca);//obtener marca del modelo modificado
      $modelo=Modelo::where('idMarca',$aux->idMarca)->get();//obtener todos los modelos de una marca

      return view('modelo.index',compact('modelo','marca'));
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
