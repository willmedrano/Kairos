<?php

namespace Kairos\Http\Controllers;

use Illuminate\Http\Request;
use Session;
use Redirect;
use Input;
use DB;
use Response;
use Kairos\Maquinaria;
use Kairos\TallerE;
use Kairos\MecanicoInterno;
use Kairos\Motorista;
use Kairos\MantenimientoCorrectivoMaq;
use Kairos\AsignarMotMaq;

class MantenimientoCorMaqController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $maquinaria=DB::select('SELECT m.idMaquinaria,e.nEquipo,
      e.nombre_img,e.semaforo,e.id
      from mantenimiento_correctivo_maqs m, maquinarias e
      where m.idMaquinaria=e.id and m.estadoMttC=1');

      return View('mantenimientoCorrectivo.indexMaq',compact('maquinaria'));
    }

    public function busqEquipo(Request $request)
    {
        $numE=$request->equipo;
        $maquinaria =Maquinaria::where('nEquipo',$numE)->get();
        if ($maquinaria->last()!=null)
         {
            $a=$maquinaria->last();//obtener ultimo registro
            $asignado=AsignarMotMaq::where('idMaquinaria',$a->id)->where('estadoAsignacionMaq',1)->get();
             //si la maquinaria se encuntra asignada con estado activo
            if ($asignado->last()!=null) {
              $b=$asignado->last();        
              $mo=$b->idMotorista;
              $mot=AsignarMotMaq::motorista($mo);//obtener nombre del motorista
            }else{
              $mot="";
              $mo=0;
            }  
            $MC=MantenimientoCorrectivoMaq::where('idMaquinaria',$a->id)->where('estadoMttC',1)->get();
            //si la maquinaria ya se encuentra en mttc redirecciona al index
            if ($MC->last()!=null) {
              return $this->index();          
            }else{//si la maquinaria no se encuentra en mttc nos permitira llevar a cabo el registro
              $taller=TallerE::where('estadoTE',1)->get();
              $motorista=Motorista::where('estadoMot',1)->where('tipoMot','Operario')->get();
              return View('mantenimientoCorrectivo.createMaq',compact('maquinaria','taller','motorista','mot','mo'));
            } 
          }
          else{
            return $this->index(); 
        }
      
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $matt=mantenimientoCorrectivoMaq::where('estadoMttC',0)->get();
      return View('mantenimientoCorrectivo.mcRealizadosMaq',compact('matt'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        MantenimientoCorrectivoMaq::create([
      'idTaller'=>$request['idTaller'],
      'idMaquinaria'=>$request['idMaquinaria'],
      'idMotorista'=>$request['idMotorista'],
      'numTrabajo'=>$request['numTrabajo'],
      'fechaInicioMtt'=>$request['fechaInicioMtt'],
      'fechaFinMtt'=>$request['fechaInicioMtt'],
      'fallasMaq'=>$request['fallasMaq'],
      'diagnosticoMec'=>"",
    ]);
    $m= Maquinaria::find($request['idMaquinaria']);
    $m->semaforo =4; //el estado del vehiculo cambia a mantt Correctivo
    $m->save();
    return redirect('/mantenimientoCorMaq')->with('create','• Mantenimiento correctivo ingresado correctamente');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $maquinaria =Maquinaria::where('id',$id)->get();
      $mant =MantenimientoCorrectivoMaq::where('idMaquinaria',$id)->where('estadoMttC',1)->get();
      return View('mantenimientoCorrectivo.finalizarCorMaq',compact('maquinaria','mant'));
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
        $m= MantenimientoCorrectivoMaq::find($id);
      $m->diagnosticoMec=$request['diagnosticoMec'];
      $m->fechaFinMtt=$request['fechaFinMtt'];
      $m->gastoMC=$request['gastoMC'];
      $m->estadoMttC=0;
      $m->save();

      $v= Maquinaria::find($request['idMaquinaria']);
      $v->semaforo =1; //el estado del vehiculo cambia a disponible
      $v->save();

      return redirect('/mantenimientoCorMaq');
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
    public function mecanico($taller){
        $modeloArray=MecanicoInterno::where('idTaller', '=', $taller)->get();
        return Response::json($modeloArray);
    }
}
