<?php

namespace Kairos;

use Illuminate\Database\Eloquent\Model;

class MantenimientoCorrectivoVeh extends Model
{
  protected $table="mantenimiento_correctivo_vehs";
  protected $fillable = ['idOrden','idMecanico','idVehiculo','idMotorista',
  'fechaInicioMtt','fechaFinMtt','fallasVeh','diagnosticoMec'];

  public static function mecanicoNom($id){
    $m=MecanicoInterno::find($id);
    return $m->nombresMec.' '.$m->apellidosMec;
  }
  public static function tallerNom($id){
    $m=MecanicoInterno::find($id);
    $t=TallerE::find($m->idTaller);
    return $t->nomTallerE;
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
