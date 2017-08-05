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
}

