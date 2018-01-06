<?php

namespace Kairos\Http\Controllers;

use Illuminate\Http\Request;
use Kairos\Http\Requests\MarcaRequest;
use Kairos\Marca;
use Kairos\Modelo;
use Kairos\Bitacora;
use Redirect;
use Session;

class MarcaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
    	$marca=Marca::where('tipoMar','Vehiculo')->get();
      	return view('marca.index',compact('marca'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('marca.frmMarca');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(MarcaRequest $request)
    {
      Marca::create([
      'nomMarca'=>$request['nomMarca'],
      'tipoMar'=>$request['tipoMar'],
    ]);
      Bitacora::bitacora("Registro de nuevo Marca: ".$request['nomMarca']);
      return redirect('/marca')->with('create','• Marca ingresada correctamente');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
      $marca =Marca::find($id);
      return view('modelo.frmModelo',compact('marca'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
      $modelo =Modelo::where('idMarca',$id)->get();
      $marca =Marca::find($id);
      return view('modelo.index',compact('modelo','marca'));
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
      $marca= Marca::find($id);
      $ma=$marca->nomMarca;
      $marca->nomMarca=$request['nomMarca'];
      $marca->tipoMar=$request['tipoMar'];
      Session::flash('update','• Marca editada correctamente');
      $marca->save();
      Bitacora::bitacora("Modificación de Marca: ".$ma);
      return Redirect::to('/marca');
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
    public function maquinaria($id)
    {
      $marca=Marca::where('tipoMar','Maquinaria')->get();
      	return view('marca.index',compact('marca'));
    }
}
