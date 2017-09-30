<?php

namespace Kairos;

use Illuminate\Database\Eloquent\Model;

class ValesCombustible extends Model
{
    //
    
    protected $table="vales_combustibles";
  protected $fillable = ['nVale', 'tipo','galones','PrecioU'];
}
