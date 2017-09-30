<?php

namespace Kairos\Http\Controllers;
use Illuminate\Http\Request;
use Session;
use Redirect;
use DB;
use Input;
use Kairos\BarrioCanton;
use Kairos\SaEnVehiculo;
use Kairos\ValesCombustible;
use Carbon\Carbon;

class ValesCombustibleController extends Controller
{
    //
     public function index()
    {
       
         return View('Vales.ejemplo');
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
    public function store(Request $request)
    {
        //

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
        //
        $saen=SaEnVehiculo::where('idVale',$id)->get();
        foreach ($saen as $key) {

            # code...
            $ids=$key->idVale;
        }

        $cc = ValesCombustible::find($ids);
        
       
            $cc->nVale=$request['nVale'];
            $cc->tipo=$request['tipo'];
            $cc->galones=$request['galones'];
            $cc->PrecioU=$request['PrecioU'];
            $cc->estadoVale=true;    
            $cc->save();

        Session::flash('mensaje','¡Registro Actualizado!');
        return redirect::to('/salidaEntrada')->with('message','update');
       
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

    public function llenado($buscar){
    $empleado=Motorista::where('nombresMot',$buscar)->get();
    
    
    return response()->json($empleado->toArray());
  }
}
