<?php

namespace Kairos;
use DB;
use Illuminate\Database\Eloquent\Model;

class Actividad extends Model
{
    //
    protected $table="actividads";
  protected $fillable = ['act','idCC','nombre_img','desc','fechaFinal','fechaInicial','estado' ];

  public static function ActCol(){
   		 return DB::table('actividads')
            ->join('barrio_cantons', 'actividads.idCC', '=', 'barrio_cantons.id')
            ->select('actividads.*',  'barrio_cantons.nombre')
            ->orderBy('actividads.id')
            ->get();
   } 
}
