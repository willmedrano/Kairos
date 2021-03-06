<?php

namespace Kairos;

use Illuminate\Database\Eloquent\Model;
use DB;
class SaEnMaquinaria extends Model
{
    //
    protected $table="sa_en_maquinarias";
    protected $fillable = ['idAsignacion','idVale','idActividad','idUbc','idUbc2','fecha','horasM','tanqueS','horaSalida','observacionS','observacionE','longitud','horaExtra' ];

  public static function disponibles(){
       return DB::table('sa_en_maquinarias')
       ->join('vales_combustibles', 'sa_en_maquinarias.idVale', '=', 'vales_combustibles.id')
       ->join('asignar_mot_maqs', 'sa_en_maquinarias.idAsignacion', '=', 'asignar_mot_maqs.id')
       ->join('maquinarias', 'asignar_mot_maqs.idMaquinaria', '=', 'maquinarias.id')
       ->join('motoristas', 'asignar_mot_maqs.idMotorista', '=', 'motoristas.id')
       ->join('actividads','sa_en_maquinarias.idActividad', '=', 'actividads.id')
       ->join('barrio_cantons','actividads.idCC', '=', 'barrio_cantons.id')
       ->where('sa_en_maquinarias.estado','=',0)
          
            
            ->select('vales_combustibles.*','motoristas.*','actividads.*','barrio_cantons.nombre','maquinarias.*','sa_en_maquinarias.*')
            ->orderBy('sa_en_maquinarias.id','desc')
            ->get();
   }
      public static function disponiblesF($fch1,$fch2){
       return DB::table('sa_en_maquinarias')
       ->join('vales_combustibles', 'sa_en_maquinarias.idVale', '=', 'vales_combustibles.id')
       ->join('asignar_mot_maqs', 'sa_en_maquinarias.idAsignacion', '=', 'asignar_mot_maqs.id')
       ->join('maquinarias', 'asignar_mot_maqs.idMaquinaria', '=', 'maquinarias.id')
       ->join('motoristas', 'asignar_mot_maqs.idMotorista', '=', 'motoristas.id')
       ->join('actividads','sa_en_maquinarias.idActividad', '=', 'actividads.id')
       ->join('barrio_cantons','actividads.idCC', '=', 'barrio_cantons.id')
          ->where('sa_en_maquinarias.fecha','>=',$fch1 )
       ->where('sa_en_maquinarias.fecha','<=',$fch2 )
            
            ->select('vales_combustibles.*','motoristas.*','actividads.*','barrio_cantons.nombre','maquinarias.*','sa_en_maquinarias.*')
            ->orderBy('sa_en_maquinarias.id','desc')
            ->get();
   }
   public static function caserio($id){
     $B=ColoniaCaserio::find($id);
     return $B->nombre;
   }
   public static function completadas(){
       return DB::table('sa_en_maquinarias')
       ->join('vales_combustibles', 'sa_en_maquinarias.idVale', '=', 'vales_combustibles.id')
       ->join('asignar_mot_maqs', 'sa_en_maquinarias.idAsignacion', '=', 'asignar_mot_maqs.id')
       ->join('maquinarias', 'asignar_mot_maqs.idMaquinaria', '=', 'maquinarias.id')
       ->join('motoristas', 'asignar_mot_maqs.idMotorista', '=', 'motoristas.id')
       ->join('actividads','sa_en_maquinarias.idActividad', '=', 'actividads.id')
       ->join('barrio_cantons','actividads.idCC', '=', 'barrio_cantons.id')
       ->where('sa_en_maquinarias.estado','=',1)
          
            
            ->select('vales_combustibles.*','motoristas.*','actividads.*','barrio_cantons.nombre','maquinarias.*','sa_en_maquinarias.*')
            ->orderBy('sa_en_maquinarias.id','desc')
            ->get();
   }
}
