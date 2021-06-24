<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Http\Controllers\Apis\Controllers\index;

class app_settings extends GeneralModel
{
    protected $table = 'app_settings';
   
   public function emails(){
      return $this->hasMany(emails::class,'app_settings_id');
   }
   public function phones(){
      return $this->hasMany(phones::class,'app_settings_id');
   }
  public static function createUpdate($params){
        $record= isset($params["id"])? self::find($params["id"]) :new self();
        $record->about_us_ar = isset($params["about_us_ar"])? $params["about_us_ar"]: $record->about_us_ar;
        $record->about_us_en = isset($params["about_us_en"])? $params["about_us_en"]: $record->about_us_en;
        $record->policy_terms_ar = isset($params["policy_terms_ar"])? $params["policy_terms_ar"]: $record->policy_terms_ar;
        $record->policy_terms_en = isset($params["policy_terms_en"])? $params["policy_terms_en"]: $record->policy_terms_en;
      //   $record->fees = isset($params["fees"])? $params["fees"]: $record->fees;
      //   $record->distance = isset($params["distance"])? $params["distance"]: $record->distance;
        $record->save();
        return $record;
    }

}
