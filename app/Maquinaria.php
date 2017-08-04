<?php

namespace Kairos;

use Illuminate\Database\Eloquent\Model;

class Maquinaria extends Model
{
  protected $table="maquinarias";
  protected $fillable = ['idTipo', 'idModelo','color','anio',
  'nEquipo','nInventario','horaM','nombre_img'];

  public static function tipo($id){
    $t=TipoVmq::find($id);
    return $t->TipoVM;
  }

  public static function modelo($id){
    $m=Modelo::find($id);
    return $m->nomModelo;
  }
}
