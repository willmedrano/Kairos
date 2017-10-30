<?php

namespace Kairos;

use Illuminate\Database\Eloquent\Model;

class Orden extends Model
{
    protected $table="ordens";
	protected $fillable = ['nOrden'];
}
