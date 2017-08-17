<?php

namespace Kairos;

use Illuminate\Database\Eloquent\Model;

class Maquinaria extends Model
{
  protected $table="maquinarias";
  protected $fillable = ['idTipo', 'idModelo','color','anio',
  'nEquipo','nInventario','horaM','nombre_img','observacionMaq'];

}
