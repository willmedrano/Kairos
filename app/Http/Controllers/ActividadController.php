<?php

namespace Kairos\Http\Controllers;

use Illuminate\Http\Request;
use Session;
use Redirect;
use DB;
use Auth;
use Input;
use Kairos\BarrioCanton;
use Kairos\ColoniaCaserio;
use Kairos\Actividad;
use Kairos\DetalleActividad;
use Carbon\Carbon;
class ActividadController extends Controller
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
        $cc=Actividad::ActCol();
      return view('actividad.index',compact('cc'));
       
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $cc=BarrioCanton::All();
       return view('Actividad.create',compact('cc'));

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
       $path = public_path().'/imagenesActividades/';
       // Guardar Original
       $image->save($path.$file->getClientOriginalName());
        Actividad::create([
            'act'=>$request['nombre'],
            'idCC'=>$request['idCC'],
            'desc'=>$request['desc'],
            'fechaInicial'=>$request['fechaInicial'],
            'fechaFinal'=>$request['fechaInicial'],
            'tipoActividad'=>$request['tipoActividad'],
            'nombre_img'=>$file->getClientOriginalName(),
        
        ]);
        \Kairos\Bitacora::bitacora("Se registro una actividad : ".$request['nombre']);
        return redirect('/actividad')->with('message','create');
       
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
        $tipo =Actividad::find($id);
        $detalles=DetalleActividad::where('idActividad',$id)->get();
        return view('Actividad.detalle',compact('id','detalles'));
       
       
       
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
      
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
        
        $cc = Actividad::find($id);
        $aux=$request['bandera'];
        if($aux=='2')
        {
            $file = Input::file('nombre_img');
            //Creamos una instancia de la libreria instalada
            $image = \Image::make(\Input::file('nombre_img'));
            //Ruta donde queremos guardar las imagenes
            $path = public_path().'/imagenesActividades/';
            // Guardar Original
            $image->save($path.$file->getClientOriginalName());
            $cc->act=$request['act'];
            $cc->desc=$request['desc'];
            $cc->fechaInicial=$request['fechaInicial'];
            $cc->fechaFinal=$request['fechaInicial'];
            $cc->tipoActividad=$request['tipoActividad'];
            
            $cc->nombre_img=$file->getClientOriginalName(); 
           
        }
        if ($aux=='1') {
            date_default_timezone_set("America/El_Salvador");
            $date = Carbon::now();
            $cc->fechaFinal=$date;
            $cc->estado=true;
            
            
        }
        $cc->save();

        \Kairos\Bitacora::bitacora("Se modifico : ".$cc->act);
        Session::flash('mensaje','¡Registro Actualizado!');
        return redirect::to('/actividad')->with('message','update');
       
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
