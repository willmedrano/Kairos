<?php

namespace Kairos;

use Illuminate\Database\Eloquent\Model;

class Articulo extends Model
{
  protected $table="articulos";
  protected $fillable = ['articulo','cantidad','descripcion'];
}
