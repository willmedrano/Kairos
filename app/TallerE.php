<?php

namespace Kairos;

use Illuminate\Database\Eloquent\Model;

class TallerE extends Model
{
  protected $table="taller_es";
  protected $fillable = ['nomTallerE','responsable','direccionTE','telefonoTE'];
}
