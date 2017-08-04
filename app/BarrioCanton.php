<?php

namespace Kairos;

use Illuminate\Database\Eloquent\Model;

class BarrioCanton extends Model
{
    //
    
     protected $table="barrio_cantons";
  protected $fillable = ['nombre','tipo'];
}
