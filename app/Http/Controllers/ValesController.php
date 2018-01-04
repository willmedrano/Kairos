<?php

namespace Kairos\Http\Controllers;


use Illuminate\Http\Request;
use Session;
use Redirect;
use DB;
use Input;
use Kairos\BarrioCanton;
use Kairos\ColoniaCaserio;

use Kairos\SaEnVehiculo;
use Kairos\SaEnMaquinaria;
use Kairos\SaEnCamion;
use Kairos\ValesCombustible;
use Carbon\Carbon;
use Kairos\Vehiculo;
use Kairos\Maquinaria;
class ValesController extends Controller
{
    //
    public function index()
    {
    	
        $cc=ValesCombustible::disponiblesVA(2);
         foreach ($cc as $c) {
        $c->idUbc=SaEnVehiculo::caserio($c->idUbc);
           
       }
     
        $cc1=ValesCombustible::disponiblesMA(2);
        foreach ($cc1 as $c) {
        $c->idUbc=SaEnMaquinaria::caserio($c->idUbc);
        
         
       }
        $cc3=ValesCombustible::All();
        


      return view('Vales.valeAgricola',compact('cc','cc1','cc3'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $cc=SaEnVehiculo::disponibles();
        foreach ($cc as $c) {
        $c->idUbc=SaEnVehiculo::caserio($c->idUbc);
           
       }
     
        $cc1=SaEnMaquinaria::disponibles();
         foreach ($cc1 as $c) {
        $c->idUbc=SaEnMaquinaria::caserio($c->idUbc);
        
         
       }
        $cc2=SaEnCamion::disponibles();
         foreach ($cc2 as $c) {
        $caserio=ColoniaCaserio::find($c->idCC);
        $canton=BarrioCanton::find($caserio->idCC);
        $c->idCC=$canton->nombre.", ".$caserio->nombre;
       }
         $cc3=ValesCombustible::All();

      return view('Vales.ValeTodos',compact('cc','cc1','cc2','cc3'));

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
       /*  $vehiculo =Vehiculo::find($id);
        $motorista=Motorista::where('estadoMot',1)->where('tipoMot','Motorista')->get();
        $asignados=\Kairos\AsignarMotVeh::where('estadoAsignacion',1)->get();*/
        
       
       
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
      $v =Maquinaria::find($id);
      $cc=ValesCombustible::disponiblesM($id);
        foreach ($cc as $c) {
        $c->idUbc=SaEnMaquinaria::caserio($c->idUbc);
        
         
       }
      
        

      return view('Vales.valeMaquinaria',compact('cc','v'));
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
