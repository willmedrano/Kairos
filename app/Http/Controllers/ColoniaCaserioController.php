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
        $cc=ColoniaCaserio::BarCan();
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
         \Kairos\Bitacora::bitacora("Se registro : ".$request['nombre']);
        return redirect('/coloniaCaserio')->with('message','create');
       
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
        $aux=$request['hi2'];
        $cc = ColoniaCaserio::find($id);
        if($aux=='4'){
            $file = Input::file('nombre_img');
            //Creamos una instancia de la libreria instalada
            $image = \Image::make(\Input::file('nombre_img'));
            //Ruta donde queremos guardar las imagenes
            $path = public_path().'/imagenesColoniasCaserios/';
            // Guardar Original
            $image->save($path.$file->getClientOriginalName());
            $cc->nombre_img=$file->getClientOriginalName();
        }
        else{
            $cc->nombre=$request['nombre'];
         }
        $cc->save();
         \Kairos\Bitacora::bitacora("Se modifico : ".$request['nombre']);
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
