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
       ->join('vales_combustibles', 'sa_en_vehiculos.idVale', '=', 'vales_combustibles.id')
       ->join('asignar_mot_vehs', 'sa_en_vehiculos.idAsignacion', '=', 'asignar_mot_vehs.id')
       ->join('vehiculos', 'asignar_mot_vehs.idVehiculo', '=', 'vehiculos.id')
       ->join('motoristas', 'asignar_mot_vehs.idMotorista', '=', 'motoristas.id')
       ->join('actividads','sa_en_vehiculos.idActividad', '=', 'actividads.id')
       ->join('barrio_cantons','actividads.idCC', '=', 'barrio_cantons.id')
          
            
            ->select('vales_combustibles.*','motoristas.*','actividads.*','barrio_cantons.nombre','vehiculos.*','sa_en_vehiculos.*')
            ->orderBy('asignar_mot_vehs.id')
            ->get();
   }
}
