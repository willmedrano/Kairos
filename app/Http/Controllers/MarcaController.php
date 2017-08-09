<?php

namespace Kairos\Http\Controllers;

use Illuminate\Http\Request;
use Kairos\Marca;
use Kairos\Modelo;
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
      $marca=\Kairos\Marca::All();
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
    public function store(Request $request)
    {
      Marca::create([
      'nomMarca'=>$request['nomMarca'],
    ]);
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
      $marca->nomMarca=$request['nomMarca'];
      Session::flash('update','• Marca editada correctamente');
      $marca->save();
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
}
