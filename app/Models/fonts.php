<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class fonts extends GeneralModel
{
    protected $table = 'fonts';

    public static function createUpdate($params){

        $record= isset($params["id"])? self::find($params["id"]) :new self();
        $record->name = isset($params["name"])? $params["name"]: $record->name;
        $record->price = isset($params["price"])? $params["price"]: $record->price;
        // $record->link =isset($params['link'])?self::$helper::uploadPhotoV2( $params['link'],'fonts'): $record->link;
        // isset($params["id"])?:$record->created_at = date("Y-m-d H:i:s");
        $record->save();
        return $record;
    }
 
}