<?php

namespace Kairos;

use Illuminate\Database\Eloquent\Model;

class MantenimientoCorrectivoMaq extends Model
{
    protected $table="mantenimiento_correctivo_maqs";
  protected $fillable = ['idOrden','idMecanico','idMaquinaria','idMotorista',
  'fechaInicioMtt','fechaFinMtt','fallasMaq','diagnosticoMec'];

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
  public static function Equipo($id){
    $e=Maquinaria::find($id);
    return $e->nEquipo;
  }
  public static function imgMaquinaria($id){
    $m=Maquinaria::find($id);
    return $m->nombre_img;
  }
}
