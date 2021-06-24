<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class effects extends GeneralModel
{
    protected $table = 'effects';

    public static function createUpdate($params){

        $record= isset($params["id"])? self::find($params["id"]) :new self();
        $record->name = isset($params["name"])? $params["name"]: $record->name;
        $record->price = isset($params["price"])? $params["price"]: $record->price;
        $record->link =isset($params['link'])?self::$helper::uploadPhotoV2( $params['link'],'effects'): $record->link;
        $record->save();
        return $record;
    }
}