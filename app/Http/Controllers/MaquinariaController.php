<?php

namespace Kairos\Http\Controllers;
use Session;
use Redirect;
use Input;
use DB;
use Response;
use Kairos\Maquinaria;
use Kairos\AsignarMotMaq;
use Kairos\TipoVmq;
use Kairos\Modelo;
use Kairos\Marca;
use Illuminate\Http\Request;
use Kairos\Http\Requests\MaquinariaRequest;

class MaquinariaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $maquinaria=DB::select('SELECT m.id,m.color,m.anio,m.nEquipo,m.nInventario,m.horaM,m.semaforo,
      m.nombre_img,m.ObservacionMaq,m.estadoMaq, t.tipoVM,mo.nomModelo,ma.nomMarca
      from maquinarias m, tipo_vmqs t,modelos mo, marcas ma
      where m.idTipo=t.id and m.idModelo=mo.id and mo.idMarca=ma.id');

      return View('maquinaria.index',compact('maquinaria'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      $tipo=TipoVmq::where('tipoVM2','Maquinaria')->get();
      $modelo=Modelo::All();
      $marca=Marca::where('tipoMar','Maquinaria')->get();
      return view('maquinaria.frmMaquinaria',compact('tipo','modelo','marca'));

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(MaquinariaRequest $request)
    {
      //obtenemos el campo file definido en el formulario
      $file = Input::file('nombre_img');
       //Creamos una instancia de la libreria instalada
       $image = \Image::make(\Input::file('nombre_img'));
       //Ruta donde queremos guardar las imagenes
       $path = public_path().'/imagenesMaquinaria/';
       // Guardar Original
       $image->save($path.$file->getClientOriginalName());

      Maquinaria::create([
        'idTipo'=>$request['idTipo'],
        'idModelo'=> $request['idModelo'],
        'color'=>$request['color'],
        'anio'=>$request['anio'],
        'nEquipo'=>$request['nEquipo'],
        'nInventario'=>$request['nInventario'],
        'horaM'=>$request['horaM'],
        'nombre_img'=>$file->getClientOriginalName(),
        'observacionMaq'=>$request['observacionMaq'],
      ]);
      return redirect('/maquinaria')->with('create','• Maquinaria ingresada correctamente');
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
        //
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
      $m= Maquinaria::find($id);

      if($aux=='2')
        {
            $m->estadoMaq =true;
            Session::flash('mensaje','• Maquinaria Activada correctamente');

        }
        else if($aux=='3')
        {
          if ($m->semaforo==3) {
            Session::flash('mensaje','• Maquinaria no puede ser dada de baja ya que se encuentra en misión');
          }else{
            $m->estadoMaq =false;
            Session::flash('mensaje','• Maquinaria dada de baja correctamente');
          }
            

        }
        else if($aux=='4')
        {
          //obtenemos el campo file definido en el formulario
          $file = Input::file('nombre_img');
           //Creamos una instancia de la libreria instalada
           $image = \Image::make(\Input::file('nombre_img'));
           //Ruta donde queremos guardar las imagenes
           $path = public_path().'/imagenesMaquinaria/';
           // Guardar Original
           $image->save($path.$file->getClientOriginalName());

           $m->nombre_img=$file->getClientOriginalName();

        }
        else{
          $m->color=$request['color'];
          $m->anio=$request['anio'];
          $m->nEquipo=$request['nEquipo'];
          $m->nInventario=$request['nInventario'];
          $m->observacionMaq=$request['observacionMaq'];
          Session::flash('update','• Maquinaria modificada correctamente');

      }

      $m->save();
      return Redirect::to('/maquinaria');
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
     $var=AsignarMotMaq::find($marca);
        $modeloArray=Maquinaria::where('id', '=', $var->idMaquinaria)->get();
        return Response::json($modeloArray);
    }
}
