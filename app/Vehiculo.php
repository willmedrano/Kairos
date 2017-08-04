<?php

namespace Kairos;

use Illuminate\Database\Eloquent\Model;

class Vehiculo extends Model
{
  protected $table="vehiculos";
  protected $fillable = ['idTipo', 'idModelo','color','anio',
  'nPlaca','nInventario','kilometraje','kilometrajeM',
  'nombre_img'];

  public static function modelo($id){
    $m=Modelo::find($id);
    return $m->nomModelo;
  }
  public static function tipo($id){
    $t=TipoVmq::find($id);
    return $t->TipoVM;
  }
}
