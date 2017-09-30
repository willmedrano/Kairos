<?php

namespace Kairos;

use Illuminate\Database\Eloquent\Model;

class MantenimientoPreMaq extends Model
{
  protected $table="mantenimiento_pre_maqs";
  protected $fillable = ['idMecanico','idMaquinaria','numTrabajo',
  'fechaInicioMtt','fechaFinMtt','observacionInicioMtt','observacionFinalMtt'];

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
