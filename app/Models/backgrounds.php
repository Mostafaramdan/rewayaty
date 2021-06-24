<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class backgrounds extends GeneralModel
{
    protected $table = 'backgrounds';

    public static function createUpdate($params){

        $record= isset($params["id"])? self::find($params["id"]) :new self();
        $record->name = isset($params["name"])? $params["name"]: $record->name;
        $record->price = isset($params["price"])? $params["price"]: $record->price;
        $record->image =isset($params['image'])?self::$helper::base64_image( $params['image'],'fonts'): $record->image;
        $record->save();
        return $record;
    }
}