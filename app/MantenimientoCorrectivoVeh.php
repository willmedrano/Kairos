<?php

namespace Kairos;

use Illuminate\Database\Eloquent\Model;

class MantenimientoCorrectivoVeh extends Model
{
  protected $table="mantenimiento_correctivo_vehs";
  protected $fillable = ['idTaller','idVehiculo','idMotorista','numTrabajo',
  'fechaInicioMtt','fechaFinMtt','fallasVeh','diagnosticoMec'];

  public static function tallerNom($id){
    $m=TallerE::find($id);
    return $m->nomTallerE;
  }
  public static function MotoristaNom($id){
    $m=Motorista::find($id);
    return $m->nombresMot.' '.$m->apellidosMot;
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
