<?php

namespace Kairos;
use DB;
use Illuminate\Database\Eloquent\Model;

class SaEnVehiculo extends Model
{
    //
     protected $table="sa_en_vehiculos";
  protected $fillable = ['idAsignacion','idVale','idActividad','fecha','kilometrajeS','tanqueS','horaSalida','observacionS','observacionE' ];

  public static function disponibles(){
       return DB::table('sa_en_vehiculos')
       ->join('asignar_mot_vehs', 'sa_en_vehiculos.idAsignacion', '=', 'asignar_mot_vehs.id')
       ->join('vehiculos', 'asignar_mot_vehs.idVehiculo', '=', 'vehiculos.id')
       
       ->join('motoristas', 'asignar_mot_vehs.idMotorista', '=', 'motoristas.id')

            
            ->where('sa_en_vehiculos.estado','=',false)
            ->select('sa_en_vehiculos.*','motoristas.*','vehiculos.*')
            ->orderBy('asignar_mot_vehs.id')
            ->get();
   }
}
