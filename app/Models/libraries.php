<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class libraries extends GeneralModel
{
    protected $table = 'libraries';

    public static function createUpdate($params){

        $record= isset($params["id"])? self::find($params["id"]) :new self();
        $record->users_id = isset($params["users_id"])? $params["users_id"]: $record->users_id;
        $record->novels_id = isset($params["novels_id"])? $params["novels_id"]: $record->novels_id;
        $record->topics_id = isset($params["topics_id"])? $params["topics_id"]: $record->topics_id;
        isset($params["id"])?:$record->created_at = date("Y-m-d H:i:s");
        $record->save();
        return $record;
    }
    public function novel(){
        return $this->belongsTo(novels::class,'novels_id');
    }
    public function topic(){
        return $this->belongsTo(topics::class,'topics_id');
    }

}