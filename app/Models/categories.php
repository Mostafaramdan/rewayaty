<?php

namespace App\Models;

use  App\Http\Controllers\Apis\Controllers\index;
use App\Http\Controllers\Apis\Helper\helper ;

use Illuminate\Database\Eloquent\Model;

class categories extends GeneralModel
{
    protected $table = 'categories';

    public $timestamps=false;
   
    public static function createUpdate($params){

        $record= isset($params["id"])? self::find($params["id"]) :new self();
        $record->name_ar = isset($params["name_ar"])? $params["name_ar"]: $record->name_ar;
        $record->name_en = isset($params["name_en"])? $params["name_en"]: $record->name_en;
        $record->image = isset($params["image"])?self::$helper::base64_image( $params["image"],'novels'): $record->image;
        isset($params["id"])?:$record->created_at = date("Y-m-d H:i:s");
        $record->save();
        return $record;
    }
}
