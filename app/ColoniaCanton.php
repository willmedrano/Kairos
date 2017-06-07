<?php

namespace Kairos;

use Illuminate\Database\Eloquent\Model;

class ColoniaCanton extends Model
{
    //
    protected $table="colonia_cantons";
  protected $fillable = ['nombre','tipo'];
}
