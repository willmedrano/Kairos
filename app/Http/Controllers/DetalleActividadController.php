<?php

namespace Kairos\Http\Controllers;

use Illuminate\Http\Request;
use Kairos\DetalleActividad;
use Input;
use Session;
use Redirect;
use DB;
class DetalleActividadController extends Controller
{
    //
    public function store(Request $request)
    {
        //

        $file = Input::file('nombre_img');
       //Creamos una instancia de la libreria instalada
       $image = \Image::make(\Input::file('nombre_img'));
       //Ruta donde queremos guardar las imagenes
       $path = public_path().'/imagenesDetalle/';
       // Guardar Original
       $image->save($path.$file->getClientOriginalName());
        DetalleActividad::create([
            'nombre'=>$request['nombre'],
           	'idActividad'=>$request['bandera'],
            'nombre_img'=>$file->getClientOriginalName(),
            'observacion'=>$request['descripcion'],
            
        
        ]);
        return redirect('/actividad')->with('message','create');
       
    }
}
