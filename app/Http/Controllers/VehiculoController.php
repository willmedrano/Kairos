<?php

namespace Kairos\Http\Controllers;
use Session;
use Redirect;
use Input;
use DB;
use Response;
use Kairos\Vehiculo;
use Kairos\Maquinaria;
use Kairos\TipoVmq;
use Kairos\Modelo;
use Kairos\Marca;
use Kairos\AsignarMotVeh;
use Illuminate\Http\Request;
use Kairos\Http\Requests\VehiculoRequest;


class VehiculoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

      $vehiculo=DB::select('SELECT v.id,v.color,v.anio,v.nPlaca,v.nInventario,v.kilometraje,v.kilometrajeM,
      v.nombre_img,v.ObservacionVeh,v.estadoVeh,v.semaforo, t.tipoVM,mo.nomModelo,ma.nomMarca
      from vehiculos v, tipo_vmqs t,modelos mo, marcas ma
      where v.idTipo=t.id and v.idModelo=mo.id and mo.idMarca=ma.id');

      return View('vehiculo.index',compact('vehiculo'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $tipo=TipoVmq::where('tipoVM2','Vehiculo')->get();
        $modelo=Modelo::All();
        $marca=Marca::where('tipoMar','Vehiculo')->get();
        return view('vehiculo.frmVehiculo',compact('tipo','modelo','marca'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(VehiculoRequest $request)
    {
      //obtenemos el campo file definido en el formulario
      $file = Input::file('nombre_img');
       //Creamos una instancia de la libreria instalada
       $image = \Image::make(\Input::file('nombre_img'));
       //Ruta donde queremos guardar las imagenes
       $path = public_path().'/imagenesVehiculos/';
       // Guardar Original
       $image->save($path.$file->getClientOriginalName());

      Vehiculo::create([
        'idTipo'=>$request['idTipo'],
        'idModelo'=> $request['idModelo'],
        'color'=>$request['color'],
        'anio'=>$request['anio'],
        'nPlaca'=>$request['nPlaca'],
        'nInventario'=>$request['nInventario'],
        'kilometraje'=>$request['kilometraje'],
        'kilometrajeM'=>$request['kilometrajeM'],
        'nombre_img'=>$file->getClientOriginalName(),
        'observacionVeh'=>$request['observacionVeh'],
      ]);
      return redirect('/vehiculo')->with('message','create');
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
      $v= Vehiculo::find($id);

      if($aux=='2')
        {
            $v->estadoVeh =true;
            Session::flash('mensaje','• Vehiculo Activado correctamente');

        }
        else if($aux=='3')
        {
          if ($v->semaforo==3) {
            Session::flash('mensaje','• Vehiculo no puede ser dado de baja ya que se encuentra en misión');
          }else{
            $v->estadoVeh =false;
            Session::flash('mensaje','• Vehiculo dado de baja correctamente');
          }

        }
        else if($aux=='4')
        {
          //obtenemos el campo file definido en el formulario
          $file = Input::file('nombre_img');
           //Creamos una instancia de la libreria instalada
           $image = \Image::make(\Input::file('nombre_img'));
           //Ruta donde queremos guardar las imagenes
           $path = public_path().'/imagenesVehiculos/';
           // Guardar Original
           $image->save($path.$file->getClientOriginalName());

           $v->nombre_img=$file->getClientOriginalName();

        }
        else{
          $v->color=$request['color'];
          $v->anio=$request['anio'];
          $v->nPlaca=$request['nPlaca'];
          $v->nInventario=$request['nInventario'];
          $v->kilometrajeM=$request['kilometrajeM'];
          Session::flash('update','• Sea actualizado con éxito el registro');

      }

      $v->save();
      return Redirect::to('/vehiculo');
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
    public function modelo($marca){
        $modeloArray=Modelo::where('idMarca', '=', $marca)->get();
        return Response::json($modeloArray);
    }
     public function modelo2($marca){
     $var=AsignarMotVeh::find($marca);
        $modeloArray=Vehiculo::where('id', '=', $var->idVehiculo)->get();
        return Response::json($modeloArray);
    }
    public function reporte()
    {
      $vehiculo=DB::select('SELECT v.id,v.color,v.anio,v.nPlaca,v.nInventario,
       t.tipoVM,mo.nomModelo,ma.nomMarca
      from vehiculos v, tipo_vmqs t,modelos mo, marcas ma
      where v.idTipo=t.id and v.idModelo=mo.id and mo.idMarca=ma.id');

      $maquinaria=DB::select('SELECT m.id,m.color,m.anio,m.nEquipo,m.nInventario,t.tipoVM,mo.nomModelo,ma.nomMarca
      from maquinarias m, tipo_vmqs t,modelos mo, marcas ma
      where m.idTipo=t.id and m.idModelo=mo.id and mo.idMarca=ma.id');

      $date = date('d-m-Y');
      $date1 = date('g:i:s a');
      $vistaurl="vehiculo.reporte";
      $view =  \View::make($vistaurl, compact('vehiculo','maquinaria','date','date1'))->render();
      $pdf = \App::make('dompdf.wrapper');
      $pdf->loadHTML($view);
      return $pdf->stream('Inventario Vehiculo-Maquinaria '.$date.'.pdf');
    }
       
}
