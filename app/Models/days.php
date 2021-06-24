<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use  App\Http\Controllers\Apis\Controllers\index;
class days extends GeneralModel
{
    protected $table = 'days',$appends=['name'];
    public static function createUpdate($params){

        $record= isset($params["id"])? self::find($params["id"]) :new self();
        $record->rank = isset($params["rank"])? $params["rank"]: $record->rank;
        $record->name_ar = isset($params["name_ar"])? $params["name_ar"]: $record->name_ar;
        $record->name_en = isset($params["name_en"])? $params["name_en"]: $record->name_en;
        isset($params["id"])?:$record->created_at = date("Y-m-d H:i:s");
        $record->save();
        return $record;
    }
    
    function GetNameAttribute(){
       $name= 'name_'.index::$lang;
       return $this->$name;
    }
 }