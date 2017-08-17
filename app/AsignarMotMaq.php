<?php

namespace Kairos;

use Illuminate\Database\Eloquent\Model;
use DB;

class AsignarMotMaq extends Model
{
  protected $table="asignar_mot_maqs";
  protected $fillable = ['idMotorista', 'idMaquinaria','fechaInicio','fechaFin','unidad','observacionAsiM'];

  public static function Asigna(){
       return DB::table('asignar_mot_maqs')
            ->where('asignar_mot_maqs.estadoAsignacionMaq','=',true)
            ->select('asignar_mot_maqs.*')
            ->orderBy('asignar_mot_maqs.id')
            ->get();
   }
   public static function asignados($id){
     $a = AsignarMotVeh::where('idVehiculo',$id);
     return $a->estadoAsignacion;
   }

   public static function motorista($id){
     $m=Motorista::find($id);
     return $m->nombresMot.' '.$m->apellidosMot;
   }
   public static function imgMaquinaria($id){
     $v=Maquinaria::find($id);
     return $v->nombre_img;
   }
   public static function nomTipo($id){
     $v=Maquinaria::find($id);
     $t=$v->idTipo;
     $v=TipoVmq::find($t);
     return $v->TipoVM;
   }
   public static function nomModelo($id){
     $v=Maquinaria::find($id);
     $m=$v->idModelo;
     $m=Modelo::find($m);
     return $m->nomModelo;
   }
   public static function numEquipo($id){
     $v=Maquinaria::find($id);
     return $v->nEquipo;
   }
}
