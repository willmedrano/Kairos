<?php

namespace Kairos;
use DB;
use Illuminate\Database\Eloquent\Model;

class Actividad extends Model
{
    //
    protected $table="actividads";
  protected $fillable = ['act','idCC','nombre_img','desc','fechaFinal','fechaInicial','tipoActividad','estado' ];

  public static function ActCol(){
   		 return DB::table('actividads')
            ->join('barrio_cantons', 'actividads.idCC', '=', 'barrio_cantons.id')
            ->select('actividads.*',  'barrio_cantons.nombre')->where('estado',0)
            ->orderBy('actividads.id')
            ->get();
   } 
   public static function Act(){
       return DB::table('actividads')
            ->join('barrio_cantons', 'actividads.idCC', '=', 'barrio_cantons.id')
            ->where('actividads.estado','=',false)
            ->select('actividads.*',  'barrio_cantons.nombre')
            ->orderBy('actividads.id')
            ->get();
   } 
   public static function Act2(){
       return DB::table('actividads')
            ->join('barrio_cantons', 'actividads.idCC', '=', 'barrio_cantons.id')
            //->where()
            ->where('actividads.tipoActividad','!=',3 )
              
              
            ->select('actividads.*',  'barrio_cantons.nombre')
            ->orderBy('actividads.id')
            ->get();
   } 

   public static function finalizadas(){
       return DB::table('actividads')
            ->join('barrio_cantons', 'actividads.idCC', '=', 'barrio_cantons.id')
            ->select('actividads.*',  'barrio_cantons.nombre')->where('estado',1)
            ->orderBy('actividads.id')
            ->get();
   } 
   public static function pendientes(){
       return DB::table('actividads')
            ->join('barrio_cantons', 'actividads.idCC', '=', 'barrio_cantons.id')
            ->select('actividads.*',  'barrio_cantons.nombre')->where('estado',0)
            ->orderBy('actividads.id')
            ->get();
   } 
}
