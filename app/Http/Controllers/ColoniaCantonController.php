<?php

namespace Kairos\Http\Controllers;

use Illuminate\Http\Request;
use Session;
use Redirect;
use DB;
use Input;
use Kairos\ColoniaCanton;
use Kairos\BarrioCaserio;

class ColoniaCantonController extends Controller
{
    //
    public function index()
    {
        //
        $cc=ColoniaCanton::paginate(3);
        
      return view('coloniaCanton.index',compact('cc'));
       
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
       return view('coloniaCanton.create');

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
        ColoniaCanton::create([
            'nombre'=>$request['nombre'],
            'tipo'=>$request['tipo'],
        
        ]);
        return redirect('/coloniaCanton');
       
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
        $tipo =ColoniaCanton::find($id);
        return view('BarrioCaserio.create',compact('tipo'));
       
       
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
      $cc =BarrioCaserio::where('idCC',$id)->get();
        $tipo =ColoniaCanton::find($id);
      

        return view('BarrioCaserio.indexFK',compact('cc','tipo'));
         
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
        $cc = ColoniaCanton::find($id);
        $cc->nombre = $request['nombre'];
        $cc->tipo = $request['tipo'];
        $cc->save();

        Session::flash('mensaje','¡Registro Actualizado!');
        return redirect::to('/coloniaCanton')->with('message','update');
       
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
