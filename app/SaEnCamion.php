<?php

namespace Kairos;

use Illuminate\Database\Eloquent\Model;
use DB;
class SaEnCamion extends Model
{
    //
    protected $table="sa_en_camions";
  protected $fillable = ['idAsignacion','idVale','idCC','fecha','kilometrajeS','tanqueS','horaSalida','observacionS','observacionE','tipo','nViajes','horaExtra' ];

  public static function disponibles(){
       return DB::table('sa_en_camions')
       ->join('vales_combustibles', 'sa_en_camions.idVale', '=', 'vales_combustibles.id')
       ->join('asignar_mot_vehs', 'sa_en_camions.idAsignacion', '=', 'asignar_mot_vehs.id')
       ->join('vehiculos', 'asignar_mot_vehs.idVehiculo', '=', 'vehiculos.id')
       ->join('motoristas', 'asignar_mot_vehs.idMotorista', '=', 'motoristas.id')
       ->join('barrio_cantons','sa_en_camions.idCC', '=', 'barrio_cantons.id')
       ->join('barrio_cantons','sa_en_camions.idCC', '=', 'barrio_cantons.id')
          
            
            ->select('vales_combustibles.*','motoristas.*','barrio_cantons.*','barrio_cantons.nombre','vehiculos.*','sa_en_camions.*')
            ->orderBy('asignar_mot_vehs.id')
            ->get();
   }
}
