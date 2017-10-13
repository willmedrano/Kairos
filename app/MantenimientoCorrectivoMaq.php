<?php

namespace Kairos;

use Illuminate\Database\Eloquent\Model;

class MantenimientoCorrectivoMaq extends Model
{
    protected $table="mantenimiento_correctivo_maqs";
  protected $fillable = ['idTaller','idMaquinaria','idMotorista','numTrabajo',
  'fechaInicioMtt','fechaFinMtt','fallasMaq','diagnosticoMec'];

  public static function tallerNom($id){
    $m=TallerE::find($id);
    return $m->nomTallerE;
  }
  public static function MotoristaNom($id){
    $m=Motorista::find($id);
    return $m->nombresMot.' '.$m->apellidosMot;
  }
  public static function Equipo($id){
    $e=Maquinaria::find($id);
    return $e->nEquipo;
  }
  public static function imgMaquinaria($id){
    $m=Maquinaria::find($id);
    return $m->nombre_img;
  }
}
