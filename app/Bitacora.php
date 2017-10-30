<?php

namespace Kairos;
use Auth;

use Illuminate\Database\Eloquent\Model;

class Bitacora extends Model
{
    protected $table = 'bitacoras';
  	protected $fillable = ['idUsuario','accion'];

  	public static function bitacora($accion){

          Bitacora::create([
          'idUsuario'=>Auth::user()->id,
          'accion'=>$accion,
        ]);
      }
}
