<?php

namespace Kairos;

use Illuminate\Database\Eloquent\Model;

class MantenimientoPreventivo extends Model
{
  protected $table="mantenimiento_preventivos";
  protected $fillable = ['idOrden','idMecanico','idVehiculo',
  'fechaInicioMtt','fechaFinMtt','observacionInicioMtt','observacionFinalMtt'];

  public static function mecanicoNom($id){
    $m=MecanicoInterno::find($id);
    return $m->nombresMec.' '.$m->apellidosMec;
  }
  public static function placa($id){
    $v=Vehiculo::find($id);
    return $v->nPlaca;
  }
  public static function imgVehiculo($id){
    $v=Vehiculo::find($id);
    return $v->nombre_img;
  }
}
