<?php

namespace Kairos;

use Illuminate\Database\Eloquent\Model;

class MantenimientoPreMaq extends Model
{
  protected $table="mantenimiento_pre_maqs";
  protected $fillable = ['idOrden','idMecanico','idMaquinaria',
  'fechaInicioMtt','fechaFinMtt','observacionInicioMtt','observacionFinalMtt','idMotorista'];

  public static function mecanicoNom($id){
    $m=MecanicoInterno::find($id);
    return $m->nombresMec.' '.$m->apellidosMec;
  }
  public static function equipo($id){
    $v=Maquinaria::find($id);
    return $v->nEquipo;
  }
  public static function imgVehiculo($id){
    $v=Maquinaria::find($id);
    return $v->nombre_img;
  }
}
