<?php

namespace Kairos;

use Illuminate\Database\Eloquent\Model;
use DB;
class BarrioCanton extends Model
{
    //
    
     protected $table="barrio_cantons";
  protected $fillable = ['nombre','tipo'];
  
  
  public static function barCan($barrio){
   		 return DB::table('colonia_caserios')
            ->join('barrio_cantons', 'colonia_caserios.idCC', '=', 'barrio_cantons.id')
            ->where('barrio_cantons.tipo','=',$barrio)
            ->select('colonia_caserios.*',  'barrio_cantons.tipo')
            ->orderBy('colonia_caserios.id')
            ->get();
   } 

  
}
