<?php

namespace App\Models;

use  App\Http\Controllers\Apis\Controllers\index;
use App\Http\Controllers\Apis\Helper\helper ;
use Illuminate\Database\Eloquent\Model;

class favorites extends GeneralModel
{
    protected $table = 'favorites';

    public static function createUpdate($params){

        $record= isset($params["id"])? self::find($params["id"]) :new self();
        $record->users_id = isset($params["users_id"])? $params["users_id"]: $record->users_id;
        $record->stores_id = isset($params["stores_id"])? $params["stores_id"]: $record->stores_id;
        $record->save();
        return $record;
    }
}
