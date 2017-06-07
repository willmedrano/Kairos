<?php

namespace Kairos;

use Illuminate\Database\Eloquent\Model;

class BarrioCaserio extends Model
{
    //
    protected $table="barrio_caserios";
  protected $fillable = ['nombre','idCC','nombre_img'];
}
