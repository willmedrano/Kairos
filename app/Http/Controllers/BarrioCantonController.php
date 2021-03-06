<?php

namespace Kairos\Http\Controllers;

use Illuminate\Http\Request;
use Session;
use Redirect;
use DB;
use Input;
use Kairos\BarrioCanton;
use Kairos\ColoniaCaserio;
use Kairos\Http\Requests\BarrioCantonRequest;
class BarrioCantonController extends Controller
{
      public function index()
    {
        $cc=BarrioCanton::where('tipo','Otros')->get();
        return view('BarrioCanton.index',compact('cc'));      
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
       return view('BarrioCanton.create');

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(BarrioCantonRequest $request)
    {
        //
        BarrioCanton::create([
            'nombre'=>$request['nombre'],
            'tipo'=>$request['tipo'],
        
        ]);
         \Kairos\Bitacora::bitacora("Se registro : ".$request['nombre']);
        return redirect('/barrioCanton')->with('message','create');
       
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
        $tipo =BarrioCanton::find($id);
        return view('ColoniaCaserio.create',compact('tipo'));
       
       
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
      $cc =ColoniaCaserio::where('idCC',$id)->get();
        $tipo =BarrioCanton::find($id);
      

        return view('ColoniaCaserio.indexFK',compact('cc','tipo'));
         
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
        $cc = BarrioCanton::find($id);
        $cc->nombre = $request['nombre'];
        $cc->tipo = $request['tipo'];
        $cc->save();
         \Kairos\Bitacora::bitacora("Se modifico : ".$request['nombre']);
        Session::flash('mensaje','¡Registro Actualizado!');
        return redirect::to('/barrioCanton')->with('message','update');
       
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
    public function barrio($id)
    {
      
        $cc=BarrioCanton::where('tipo','Barrio')->get();
        return view('BarrioCanton.index',compact('cc'));
    }
    public function canton($id)
    {
        $cc=BarrioCanton::where('tipo','Cantón')->get();
        return view('BarrioCanton.index',compact('cc'));
    }

    public function reporte()
    {

        $tipo='Barrio';
      $cc=BarrioCanton::barCan($tipo);
      $barrio=BarrioCanton::All();
      $date = date('d-m-Y');
      $date1 = date('g:i:s a');
      $vistaurl="reportes.reporteBarrio";
      $view =  \View::make($vistaurl, compact('cc','barrio', 'date','date1','tipo'))->render();
      $pdf = \App::make('dompdf.wrapper');
      $pdf->loadHTML($view);
      return $pdf->stream('Reporte Barrio-colonia '.$date.'.pdf');
    }
     public function reporte2()
    {
        $tipo='Cantón';
      $cc=BarrioCanton::barCan($tipo);
      $barrio=BarrioCanton::All();
      $date = date('d-m-Y');
      $date1 = date('g:i:s a');
      $vistaurl="reportes.reporteBarrio";
      $view =  \View::make($vistaurl, compact('cc','barrio', 'date','date1','tipo'))->render();
      $pdf = \App::make('dompdf.wrapper');
      $pdf->loadHTML($view);
      return $pdf->stream('Reporte Canton-Caserio '.$date.'.pdf');
    }
}
