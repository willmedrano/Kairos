<?php

namespace Kairos;

use Illuminate\Database\Eloquent\Model;
use DB;
class SaEnCamion extends Model
{
    //
    protected $table="sa_en_camions";
  protected $fillable = ['idAsignacion','idVale','idCC','idUbc','idActividad','fecha','kilometrajeS','tanqueS','horaSalida','observacionS','observacionE','tipo','nViajes','horaExtra' ];

  public static function disponibles(){
       return DB::table('sa_en_camions')
       ->join('vales_combustibles', 'sa_en_camions.idVale', '=', 'vales_combustibles.id')
       ->join('asignar_mot_vehs', 'sa_en_camions.idAsignacion', '=', 'asignar_mot_vehs.id')
       ->join('vehiculos', 'asignar_mot_vehs.idVehiculo', '=', 'vehiculos.id')
       ->join('motoristas', 'asignar_mot_vehs.idMotorista', '=', 'motoristas.id')
       ->where('sa_en_camions.estadoC','=',0 )
       
          
            
            ->select('vales_combustibles.*','motoristas.*','vehiculos.*','sa_en_camions.*')
            ->orderBy('sa_en_camions.id','desc')
            ->get();
   }
     public static function barrio($id){
     $B=BarrioCanton::find($id);
     return $B->nombre;
   }
    public static function disponiblesF($fch1,$fch2){
       return DB::table('sa_en_camions')
       ->join('vales_combustibles', 'sa_en_camions.idVale', '=', 'vales_combustibles.id')
       ->join('asignar_mot_vehs', 'sa_en_camions.idAsignacion', '=', 'asignar_mot_vehs.id')
       ->join('vehiculos', 'asignar_mot_vehs.idVehiculo', '=', 'vehiculos.id')
       ->join('motoristas', 'asignar_mot_vehs.idMotorista', '=', 'motoristas.id')
      
          ->where('sa_en_camions.fecha','>=',$fch1 )
       ->where('sa_en_camions.fecha','<=',$fch2 )
            
            ->select('vales_combustibles.*','motoristas.*','vehiculos.*','sa_en_camions.*')
            ->orderBy('sa_en_camions.id','desc')
            ->get();
   }
   
   public static function completadas(){
       return DB::table('sa_en_camions')
       ->join('vales_combustibles', 'sa_en_camions.idVale', '=', 'vales_combustibles.id')
       ->join('asignar_mot_vehs', 'sa_en_camions.idAsignacion', '=', 'asignar_mot_vehs.id')
       ->join('vehiculos', 'asignar_mot_vehs.idVehiculo', '=', 'vehiculos.id')
       ->join('motoristas', 'asignar_mot_vehs.idMotorista', '=', 'motoristas.id')
       ->where('sa_en_camions.estadoC','=',1 )
       
          
            
            ->select('vales_combustibles.*','motoristas.*','vehiculos.*','sa_en_camions.*')
            ->orderBy('sa_en_camions.id','desc')
            ->get();
   }
}
