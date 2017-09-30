<?php

namespace Kairos\Http\Controllers;

use Illuminate\Http\Request;
use Kairos\Articulo;
use Redirect;
use Session;

class ArticuloController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $articulos=\Kairos\Articulo::All();
      return view('articulos.index',compact('articulos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('articulos.frmArticulo');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      Articulo::create([
      'articulo'=>$request['articulo'],
      'cantidad'=>$request['cantidad'],
      'descripcion'=>$request['descripcion'],
    ]);
    return redirect('/articulos')->with('create','• Articulo ingresado correctamente');
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
      $a= Articulo::find($id);
      $a->articulo=$request['articulo'];
      $a->cantidad=$request['cantidad'];
      $a->descripcion=$request['descripcion'];
      Session::flash('update','• Articulo editado correctamente');
      $a->save();
      return Redirect::to('/articulos');
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
