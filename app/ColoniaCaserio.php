<?php

namespace Kairos;

use Illuminate\Database\Eloquent\Model;

class ColoniaCaserio extends Model
{
    //
     protected $table="colonia_caserios";
  protected $fillable = ['nombre','idCC','nombre_img'];
}
