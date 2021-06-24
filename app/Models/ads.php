<?php

namespace App\Models;

use  App\Http\Controllers\Apis\Controllers\index;
use App\Http\Controllers\Apis\Helper\helper ;
use Illuminate\Database\Eloquent\Model;

class ads extends GeneralModel
{
    protected $table = 'ads';

    public static function createUpdate($params){
        
        $record= isset($params["id"])? self::find($params["id"]) :new self();
        $record->start_at = isset($params["start_date"])? $params["start_date"]: $record->start_at;
        $record->end_at = isset($params["end_date"])? $params["end_date"]: $record->end_at;
        $record->url = isset($params["action"])? $params["action"]: $record->url;
        $record->image = isset($params["image"])?helper::uploadPhotoV2($params["image"],'ads'): $record->image;
        $record->type = isset($params["type"])? $params["type"]: $record->type;

        if($params["novels_id"] != 0) $record->novels_id=$params["novels_id"]; else  $record->novels_id=null;
        if($params["topics_id"] !=0)   $record->topics_id=$params["topics_id"]; else $record->novels_id=null;
        
        isset($params["id"])?:$record->created_at = date("Y-m-d H:i:s");
        $record->save();
        return $record;
    }

    public function Novel(){
        return $this->hasOne(novels::class,'id','novels_id');
    }
    public function Topic(){
        return $this->hasOne(topics::class,'id','topics_id');
    }
}
