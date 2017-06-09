<?php

namespace Kairos\Http\Controllers;

use Illuminate\Http\Request;
use Session;
use Redirect;
use DB;
use Input;
use Kairos\BarrioCaserio;

class BarrioCaserioController extends Controller
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
        $cc=BarrioCaserio::All();
      return view('BarrioCaserio.index',compact('cc'));
       
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
       return view('BarrioCaserio.create');

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
       $path = public_path().'/imagenesBarriosCaserios/';
       // Guardar Original
       $image->save($path.$file->getClientOriginalName());
        BarrioCaserio::create([
            'nombre'=>$request['nombre'],
            'idCC'=>$request['id'],
            'nombre_img'=>$file->getClientOriginalName(),
        
        ]);
        return redirect('/barrioCaserio');
       
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
      $cc=BarrioCaserio::find($id);

      return view('BarrioCaserio.edit',compact('cc'));  
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
       $path = public_path().'/imagenesBarriosCaserios/';
       // Guardar Original
       $image->save($path.$file->getClientOriginalName());
        $cc = BarrioCaserio::find($id);
        
        $cc->nombre=$request['nombre'];
         $cc->nombre_img=$file->getClientOriginalName();
        $cc->save();

        Session::flash('mensaje','¡Registro Actualizado!');
        return redirect::to('/barrioCaserio')->with('message','update');
       
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
