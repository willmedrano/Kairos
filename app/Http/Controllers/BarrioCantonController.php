<?php

namespace Kairos\Http\Controllers;

use Illuminate\Http\Request;
use Session;
use Redirect;
use DB;
use Input;
use Kairos\BarrioCanton;
use Kairos\ColoniaCaserio;

class BarrioCantonController extends Controller
{
      public function index()
    {
        //
        $cc=BarrioCanton::paginate(3);
        
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
    public function store(Request $request)
    {
        //
        BarrioCanton::create([
            'nombre'=>$request['nombre'],
            'tipo'=>$request['tipo'],
        
        ]);
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
}
