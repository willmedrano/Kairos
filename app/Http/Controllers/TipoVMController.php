<?php

namespace Kairos\Http\Controllers;

use Illuminate\Http\Request;
use Kairos\Http\Requests\TipoVMRequest;
use Kairos\TipoVmq;
use Redirect;
use Session;

class TipoVMController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $tipo=\Kairos\TipoVmq::All();
      return view('tipoVM.index',compact('tipo'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('tipoVM.frmTipoVM');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(TipoVMRequest $request)
    {
      TipoVmq::create([
      'TipoVM'=>$request['TipoVM'],
      'TipoVM2'=>$request['TipoVM2'],
      ]);
      return redirect('/tipoVM')->with('create','• Registro ingresado correctamente');
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
      $tipo= TipoVmq::find($id);
      $tipo->TipoVM=$request['TipoVM'];
      $tipo->TipoVM2=$request['TipoVM2'];
      Session::flash('update','• Tipo V/M editado correctamente');
      $tipo->save();
      return Redirect::to('/tipoVM');
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
