<?php

namespace Kairos;

use Illuminate\Database\Eloquent\Model;

class AsignarMotVeh extends Model
{
  protected $table="asignar_mot_vehs";
  protected $fillable = ['idMotorista', 'idVehiculo','fechaInicio','fechaFin'];
}
