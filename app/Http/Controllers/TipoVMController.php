<?php

namespace Kairos\Http\Controllers;

use Illuminate\Http\Request;
use Kairos\Http\Requests\TipoVMRequest;
use Kairos\TipoVmq;
use Kairos\Bitacora;
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
      $tipo=TipoVmq::where('TipoVM2','Vehiculo')->get();
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
      Bitacora::bitacora("Registro de nuevo Tipo: ".$request['TipoVM']);
      return redirect('/tipoVM')->with('create','• Registro ingresado correctamente');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function maquinaria($id)
    {
        $tipo=TipoVmq::where('TipoVM2','Maquinaria')->get();
        return view('tipoVM.index',compact('tipo'));
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
      $ta=$tipo->TipoVM;
      $tipo->TipoVM=$request['TipoVM'];
      $tipo->TipoVM2=$request['TipoVM2'];
      Session::flash('update','• Tipo V/M editado correctamente');
      $tipo->save();
      Bitacora::bitacora("Modificación del Tipo: ".$ta);
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
