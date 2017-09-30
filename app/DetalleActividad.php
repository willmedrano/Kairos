<?php

namespace Kairos;

use Illuminate\Database\Eloquent\Model;

class DetalleActividad extends Model
{
    //
    protected $table="detalle_actividads";
  protected $fillable = ['nombre','nombre_img', 'idActividad','observacion'];

}
