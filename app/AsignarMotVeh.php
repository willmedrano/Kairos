<?php

namespace Kairos;

use Illuminate\Database\Eloquent\Model;
use DB;
class AsignarMotVeh extends Model
{
  protected $table="asignar_mot_vehs";
  protected $fillable = ['idMotorista', 'idVehiculo','fechaInicio','fechaFin'];

  public static function Asigna(){
   		 return DB::table('asignar_mot_vehs')
            ->where('asignar_mot_vehs.estadoAsignacion','=',true)
            ->select('asignar_mot_vehs.*')
            ->orderBy('asignar_mot_vehs.id')
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
   public static function imgVehiculo($id){
     $v=Vehiculo::find($id);
     return $v->nombre_img;
   }
   public static function nomTipo($id){
     $v=Vehiculo::find($id);
     $t=$v->idTipo;
     $v=TipoVmq::find($t);
     return $v->TipoVM;
   }
   public static function nomModelo($id){
     $v=Vehiculo::find($id);
     $m=$v->idModelo;
     $m=Modelo::find($m);
     return $m->nomModelo;
   }
   public static function numPlaca($id){
     $v=Vehiculo::find($id);
     return $v->nPlaca;
   }
}
