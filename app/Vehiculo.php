<?php

namespace Kairos;

use Illuminate\Database\Eloquent\Model;

class Vehiculo extends Model
{
  protected $table="vehiculos";
  protected $fillable = ['idTipo', 'idModelo','color','anio',
  'nPlaca','nInventario','kilometraje','kilometrajeM',
  'nombre_img','observacionVeh'];
}
