<?php

namespace Kairos\Http\Controllers;

use Illuminate\Http\Request;
use Kairos\Http\Requests\MotoristaRequest;
use Session;
use Redirect;
use DB;
use Input;
use Kairos\Motorista;
use Kairos\Bitacora;
use Kairos\AsignarMotVeh;
use Kairos\AsignarMotMaq;
use Carbon\Carbon;
class MotoristaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $motorista=DB::select('SELECT * FROM motoristas where estadoMot=1 ');
        return view('motorista.index',compact('motorista'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('motorista.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(MotoristaRequest $request)
    {
      //obtenemos el campo file definido en el formulario
      $file = Input::file('nombre_img');
       //Creamos una instancia de la libreria instalada
       $image = \Image::make(\Input::file('nombre_img'));
       //Ruta donde queremos guardar las imagenes
       $path = public_path().'/imagenesMotoristas/';
       // Guardar Original
       $image->save($path.$file->getClientOriginalName());

      Motorista::create([
        'nombresMot'=>$request['nombresMot'],
        'apellidosMot'=> $request['apellidosMot'],
        'direccionMot'=>$request['direccionMot'],
        'sexo'=>$request['sexo'],
        'telefonoMot'=>$request['telefonoMot'],
        'DUI'=>$request['DUI'],
        'licencia'=>$request['licencia'],
        'fechaNacimiento'=>$request['fechaNacimiento'],
        'fechaContrato'=>$request['fechaContrato'],
        'fechaDespido'=>$request['fechaContrato'],
        'nombre_img'=>$file->getClientOriginalName(),
        'tipoMot'=>$request['tipoMot'],
        'observacionMot'=>$request['observacionMot'],
      ]);
      Bitacora::bitacora("Registro de nuevo Motorista-Operario: ".$request['nombresMot']." ".$request['apellidosMot']);
      return redirect('/motorista')->with('create','• Sea creado con éxito el registro');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
      // $motorista=DB::select('SELECT * FROM motoristas where idMotorista','=',$id);
      $motorista=Motorista::find($id);

      return view('motorista.edit',compact('motorista'));
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
      $motorista= Motorista::find($id);

      if($aux=='2') //activar motorista/ operario
        {
            $motorista->fechaDespido=$motorista->fechaContrato;
            $motorista->estadoMot =true;
            Bitacora::bitacora("Activo al Motorista: ".$motorista->nombresMot." ".$motorista->apellidosMot);
            Session::flash('mensaje','• Motorista Activado correctamente');
        }
        else if($aux=='3') //desactivar motorista/ operario
        {
            $idM=$motorista->id;//obtener id del motorista a desactivar
            $tipo=$motorista->tipoMot;//obtener id del motorista a desactivar

            if($tipo=='Motorista')
            {
              $asignacion=AsignarMotVeh::where('idMotorista',$idM)->where('estadoAsignacion',1)->get();
              //si la consulta encontro una asignacion activa obtendra resultado distinto de null
            
              if($asignacion->last()!=null)
              {//si entra a esta condicion significa que hay asignacion activa
                Session::flash('mensaje','• Este Motorista no puede ser desactivado, debido a que posee una asignación');
                return Redirect::to('/motorista');
              }else{            
                date_default_timezone_set("America/El_Salvador");
                $date = Carbon::now();
                $motorista->fechaDespido=$date;
                $motorista->estadoMot =false;
                Bitacora::bitacora("Desactivo al Motorista: ".$motorista->nombresMot." ".$motorista->apellidosMot);
                Session::flash('mensaje','• Motorista Desactivado correctamente');
              }
            }
           else if($tipo=='Operario')
            {
              $asignacion=AsignarMotMaq::where('idMotorista',$idM)->where('estadoAsignacionMaq',1)->get();
              //si la consulta encontro una asignacion activa obtendra resultado distinto de null
            
              if($asignacion->last()!=null)
              {//si entra a esta condicion significa que hay asignacion activa
                Session::flash('mensaje','• Este Operario no puede ser desactivado, debido a que posee una asignación');
                return Redirect::to('/motorista');
              }else{            
                date_default_timezone_set("America/El_Salvador");
                $date = Carbon::now();
                $motorista->fechaDespido=$date;
                $motorista->estadoMot =false;
                Bitacora::bitacora("Desactivo al Operario: ".$motorista->nombresMot." ".$motorista->apellidosMot);
                Session::flash('mensaje','• Motorista Desactivado correctamente');
              }
            }
              
        }
        else if($aux=='4') //actualizar fotografia
        {
             $file = Input::file('nombre_img');
             //Creamos una instancia de la libreria instalada
             $image = \Image::make(\Input::file('nombre_img'));
             //Ruta donde queremos guardar las imagenes
             $path = public_path().'/imagenesMotoristas/';
             // Guardar Original
             $image->save($path.$file->getClientOriginalName());
             $motorista->nombre_img=$file->getClientOriginalName();
             Bitacora::bitacora("Actualización de foto de: ".$motorista->nombresMot." ".$motorista->apellidosMot);
        }

        else{ //actualizar datos

               $motorista->nombresMot=$request['nombresMot'];
               $motorista->apellidosMot=$request['apellidosMot'];
               $motorista->direccionMot=$request['direccionMot'];
               $motorista->sexo=$request['sexo'];
               $motorista->telefonoMot=$request['telefonoMot'];
               $motorista->DUI=$request['DUI'];
               $motorista->licencia=$request['licencia'];
               $motorista->fechaNacimiento=$request['fechaNacimiento'];
               $motorista->fechaContrato=$request['fechaContrato'];
               $motorista->tipoMot=$request['tipoMot'];
               $motorista->observacionMot=$request['observacionMot'];
               Session::flash('update','• Motorista editado correctamente');

               Bitacora::bitacora("Actualización de datos de: ".$motorista->nombresMot." ".$motorista->apellidosMot);

        }
      $motorista->save();
      return Redirect::to('/motorista');

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
    public function desactivo($id)
    {
        $motorista=DB::select('SELECT * FROM motoristas where estadoMot=0 ');
        return view('motorista.index',compact('motorista'));
    }
    public function reporte()
    {
      $motoristas=Motorista::All();
      $date = date('d-m-Y');
      $date1 = date('g:i:s a');
      $vistaurl="motorista.reporte";
      $view =  \View::make($vistaurl, compact('motoristas', 'date','date1'))->render();
      $pdf = \App::make('dompdf.wrapper');
      $pdf->loadHTML($view);
      return $pdf->stream('Reporte Motorista-Operario '.$date.'.pdf');
    }
}
