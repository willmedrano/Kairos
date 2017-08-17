<?php

namespace Kairos;

use Illuminate\Database\Eloquent\Model;

class Motorista extends Model
{
  protected $table="motoristas";
  protected $fillable = ['nombresMot', 'apellidosMot','direccionMot','sexo',
  'telefonoMot','DUI','licencia','fechaNacimiento','fechaContrato','fechaDespido',
  'nombre_img','tipoMot','observacionMot'];

}
