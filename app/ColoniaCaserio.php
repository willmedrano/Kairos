<?php

namespace Kairos;

use Illuminate\Database\Eloquent\Model;
use DB;
class ColoniaCaserio extends Model
{
    //
     protected $table="colonia_caserios";
  protected $fillable = ['nombre','idCC','nombre_img'];

  public static function barCan(){
   		 return DB::table('colonia_caserios')
            ->join('barrio_cantons', 'colonia_caserios.idCC', '=', 'barrio_cantons.id')
            ->select('colonia_caserios.*',  'barrio_cantons.tipo')
            ->orderBy('colonia_caserios.id')
            ->get();
   } 
}
