<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class emails extends GeneralModel
{
    protected $table = 'emails';

    public static function createUpdate($params){

        $record= isset($params["id"])? self::find($params["id"]) :new self();
        $record->email = isset($params["email"])? $params["email"]: $record->email;
        $record->app_settings_id = isset($params["app_settings_id"])? $params["app_settings_id"]: $record->app_settings_id;
        $record->is_active = isset($params["is_active"])? $params["is_active"]: 1;
        $record->stores_id = isset($params["stores_id"])? $params["stores_id"]: $record->stores_id;
       
        $record->save();
        return $record;
    }
    public function ModelName1(){
        return $this->belongsTo("\App\Models\ModelName1","ModelName1_id");
    }
    public function ModelName2(){
        return $this->hasMany("\App\Models\ModelName2",'emails_id');
    }
}