<?php

namespace Kairos\Http\Controllers;

use Illuminate\Http\Request;
use Session;
use Redirect;
use DB;
use Input;
use Kairos\ColoniaCaserio;

class ColoniaCaserioController extends Controller
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
        $cc=ColoniaCaserio::All();
      return view('ColoniaCaserio.index',compact('cc'));
       
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
       return view('ColoniaCaserio.create');

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
        $file = Input::file('nombre_img');
       //Creamos una instancia de la libreria instalada
       $image = \Image::make(\Input::file('nombre_img'));
       //Ruta donde queremos guardar las imagenes
       $path = public_path().'/imagenesColoniasCaserios/';
       // Guardar Original
       $image->save($path.$file->getClientOriginalName());
        ColoniaCaserio::create([
            'nombre'=>$request['nombre'],
            'idCC'=>$request['id'],
            'nombre_img'=>$file->getClientOriginalName(),
        
        ]);
        return redirect('/coloniaCaserio');
       
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
      $cc=ColoniaCaserio::find($id);

      return view('ColoniaCaserio.edit',compact('cc'));  
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
        $file = Input::file('nombre_img');
       //Creamos una instancia de la libreria instalada
       $image = \Image::make(\Input::file('nombre_img'));
       //Ruta donde queremos guardar las imagenes
       $path = public_path().'/imagenesColoniasCaserios/';
       // Guardar Original
       $image->save($path.$file->getClientOriginalName());
        $cc = ColoniaCaserio::find($id);
        
        $cc->nombre=$request['nombre'];
         $cc->nombre_img=$file->getClientOriginalName();
        $cc->save();

        Session::flash('mensaje','¡Registro Actualizado!');
        return redirect::to('/coloniaCaserio')->with('message','update');
       
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