<?php

namespace Kairos;

use Illuminate\Database\Eloquent\Model;
use DB;
class ValesCombustible extends Model
{
    //
    
    protected $table="vales_combustibles";
  protected $fillable = ['nVale', 'tipo','galones','PrecioU','total'];

  public static function disponibles($id){
       return DB::table('sa_en_vehiculos')
       ->join('vales_combustibles', 'sa_en_vehiculos.idVale', '=', 'vales_combustibles.id')
       ->join('asignar_mot_vehs', 'sa_en_vehiculos.idAsignacion', '=', 'asignar_mot_vehs.id')
       ->join('vehiculos', 'asignar_mot_vehs.idVehiculo', '=', 'vehiculos.id')
       ->join('motoristas', 'asignar_mot_vehs.idMotorista', '=', 'motoristas.id')
       ->join('actividads','sa_en_vehiculos.idActividad', '=', 'actividads.id')
       ->join('barrio_cantons','actividads.idCC', '=', 'barrio_cantons.id')
       
       ->where('vehiculos.id','=',$id)
          
            
            ->select('vales_combustibles.*','motoristas.*','actividads.*','barrio_cantons.nombre','vehiculos.*','sa_en_vehiculos.*')
            ->orderBy('asignar_mot_vehs.id')
            ->get();
   }
   public static function disponiblesM($id){
       return DB::table('sa_en_maquinarias')
       ->join('vales_combustibles', 'sa_en_maquinarias.idVale', '=', 'vales_combustibles.id')
       ->join('asignar_mot_maqs', 'sa_en_maquinarias.idAsignacion', '=', 'asignar_mot_maqs.id')
       ->join('maquinarias', 'asignar_mot_maqs.idMaquinaria', '=', 'maquinarias.id')
       ->join('motoristas', 'asignar_mot_maqs.idMotorista', '=', 'motoristas.id')
       ->join('actividads','sa_en_maquinarias.idActividad', '=', 'actividads.id')
       ->join('barrio_cantons','actividads.idCC', '=', 'barrio_cantons.id')
       
       ->where('maquinarias.id','=',$id)
          
            
            ->select('vales_combustibles.*','motoristas.*','actividads.*','barrio_cantons.nombre','maquinarias.*','sa_en_maquinarias.*')
            ->orderBy('sa_en_maquinarias.idVale')
            ->get();
   }
    public static function disponiblesC($id){
       return DB::table('sa_en_camions')
       ->join('vales_combustibles', 'sa_en_camions.idVale', '=', 'vales_combustibles.id')
       ->join('asignar_mot_vehs', 'sa_en_camions.idAsignacion', '=', 'asignar_mot_vehs.id')
       ->join('vehiculos', 'asignar_mot_vehs.idVehiculo', '=', 'vehiculos.id')
       ->join('motoristas', 'asignar_mot_vehs.idMotorista', '=', 'motoristas.id')
       ->join('actividads','sa_en_camions.idActividad', '=', 'actividads.id')
       ->join('barrio_cantons','actividads.idCC', '=', 'barrio_cantons.id')
       
       ->where('vehiculos.id','=',$id)
          
            
            ->select('vales_combustibles.*','motoristas.*','actividads.*','barrio_cantons.nombre','vehiculos.*','sa_en_camions.*')
            ->orderBy('asignar_mot_vehs.id')
            ->get();
   }
   public static function disponiblesVA($id){
       return DB::table('sa_en_vehiculos')
       ->join('vales_combustibles', 'sa_en_vehiculos.idVale', '=', 'vales_combustibles.id')
       ->join('asignar_mot_vehs', 'sa_en_vehiculos.idAsignacion', '=', 'asignar_mot_vehs.id')
       ->join('vehiculos', 'asignar_mot_vehs.idVehiculo', '=', 'vehiculos.id')
       ->join('motoristas', 'asignar_mot_vehs.idMotorista', '=', 'motoristas.id')
       ->join('actividads','sa_en_vehiculos.idActividad', '=', 'actividads.id')
       ->join('barrio_cantons','actividads.idCC', '=', 'barrio_cantons.id')
       
        ->where('actividads.tipoActividad','=',$id)
          
            
            ->select('vales_combustibles.*','motoristas.*','actividads.*','barrio_cantons.nombre','vehiculos.*','sa_en_vehiculos.*')
            ->orderBy('asignar_mot_vehs.id')
            ->get();
   }

   public static function disponiblesMA($id){
       return DB::table('sa_en_maquinarias')
       ->join('vales_combustibles', 'sa_en_maquinarias.idVale', '=', 'vales_combustibles.id')
       ->join('asignar_mot_maqs', 'sa_en_maquinarias.idAsignacion', '=', 'asignar_mot_maqs.id')
       ->join('maquinarias', 'asignar_mot_maqs.idMaquinaria', '=', 'maquinarias.id')
       ->join('motoristas', 'asignar_mot_maqs.idMotorista', '=', 'motoristas.id')
       ->join('actividads','sa_en_maquinarias.idActividad', '=', 'actividads.id')
       ->join('barrio_cantons','actividads.idCC', '=', 'barrio_cantons.id')
       
       ->where('actividads.tipoActividad','=',$id)
          
            
            ->select('vales_combustibles.*','motoristas.*','actividads.*','barrio_cantons.nombre','maquinarias.*','sa_en_maquinarias.*')
            ->orderBy('asignar_mot_maqs.id')
            ->get();
   }
   public static function disponiblesCA($id){
       return DB::table('sa_en_camions')
       ->join('vales_combustibles', 'sa_en_camions.idVale', '=', 'vales_combustibles.id')
       ->join('asignar_mot_vehs', 'sa_en_camions.idAsignacion', '=', 'asignar_mot_vehs.id')
       ->join('vehiculos', 'asignar_mot_vehs.idVehiculo', '=', 'vehiculos.id')
       ->join('motoristas', 'asignar_mot_vehs.idMotorista', '=', 'motoristas.id')
       ->join('actividads','sa_en_camions.idActividad', '=', 'actividads.id')
       ->join('barrio_cantons','actividads.idCC', '=', 'barrio_cantons.id')
       
        ->where('actividads.tipoActividad','=',$id)
          
            
            ->select('vales_combustibles.*','motoristas.*','actividads.*','barrio_cantons.nombre','vehiculos.*','sa_en_camions.*')
            ->orderBy('asignar_mot_vehs.id')
            ->get();
   }

  
}
