<?php

namespace Kairos;

use Illuminate\Database\Eloquent\Model;

class Modelo extends Model
{
  protected $table="modelos";
  protected $fillable = ['nomModelo','idMarca'];

  
}
