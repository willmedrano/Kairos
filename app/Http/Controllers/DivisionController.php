<?php

namespace Kairos\Http\Controllers;

use Illuminate\Http\Request;
use Session;
use Redirect;
use DB;
use Input;
use Kairos\ColoniaCanton;

class DivisionController extends Controller
{
//
     /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
 
   
    public function index()
    {
        //
        $cc=ColoniaCanton::All();
      return view('divPolitica.index',compact('cc'));
       
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
       return view('divPolitica.create');

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
        return redirect('/division');
       
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
      $cc=ColoniaCanton::find($id);

      return view('divPolitica.edit',compact('cc'));  
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
        return redirect::to('/division')->with('message','update');
       
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
