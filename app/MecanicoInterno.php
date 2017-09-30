<?php

namespace Kairos;

use Illuminate\Database\Eloquent\Model;

class MecanicoInterno extends Model
{
  protected $table="mecanico_internos";
  protected $fillable = ['nombresMec', 'apellidosMec','direccionMec','sexo',
  'telefonoMec','DUI','fechaNacimiento','fechaContrato','fechaDespido',
  'nombre_img','observacionMec'];
}
