<?php

namespace Kairos\Http\Controllers;

use Session;
use Redirect;
use Response;
use DB;
use Kairos\Vehiculo;
use Kairos\Marca;
use Kairos\TipoVmq;
use Kairos\Motorista;
use Kairos\AsignarMotVeh;

use Illuminate\Http\Request;

class AsignarMotVehController extends Controller
{
    //
    public function index()
      {
        // $vehiculo=DB::select('SELECT * FROM vehiculos where estadoVeh=1 ');
        $vehiculo=\Kairos\Vehiculo::where('estadoVeh',1)->get();
        $marca=\Kairos\Marca::All();
        $tipo=\Kairos\TipoVmq::All();
        $v1=\Kairos\AsignarMotVeh::Asigna();

        return View('asignar.indexVehiculo',compact('vehiculo','marca','tipo','v1'));
      }

      /**
       * Show the form for creating a new resource.
       *
       * @return \Illuminate\Http\Response
       */
      public function create()
      {
      }

      /**
       * Store a newly created resource in storage.
       *
       * @param  \Illuminate\Http\Request  $request
       * @return \Illuminate\Http\Response
       */
      public function store(Request $request)
      {
        AsignarMotVeh::create([
          'idMotorista'=>$request['idMotorista'],
          'idVehiculo'=> $request['idVehiculo'],
          'fechaInicio'=>$request['fechaInicio'],
          'fechaFin'=>$request['fechaInicio'],
        ]);
        return redirect('/asignarMotVeh');
      }

      /**
       * Display the specified resource.
       *
       * @param  int  $id
       * @return \Illuminate\Http\Response
       */
      public function show($id)
      {
        $vehiculo =Vehiculo::find($id);
        $motorista=Motorista::All();
        return view('asignar.showVehiculo',compact('vehiculo','motorista'));
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
          //
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
