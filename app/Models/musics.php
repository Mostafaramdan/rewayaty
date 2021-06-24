<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class musics extends GeneralModel
{
    protected $table = 'musics';

    public static function createUpdate($params){

        $record= isset($params["id"])? self::find($params["id"]) :new self();
        $record->name = isset($params["name"])? $params["name"]: $record->name;
        $record->price = isset($params["price"])? $params["price"]: $record->price;
        $record->link =isset($params['link'])?self::$helper::uploadPhotoV2( $params['link'],'musics'): $record->link;
        $record->save();
        return $record;
    }
}