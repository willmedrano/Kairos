<?php

namespace Kairos;
use Auth;
use DB;
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
       public static function barCan(){
   		 return DB::table('bitacoras')
            ->join('users', 'bitacoras.idUsuario', '=', 'users.id')
            
            ->select('bitacoras.*',  'users.name')
            ->orderBy('bitacoras.id','desc')
            ->get();
   } 
   public static function usrNom($id){
    $n=User::find($id);
    return $n->name;
  }
}
