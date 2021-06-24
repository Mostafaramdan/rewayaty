<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class role_requests extends GeneralModel
{
    protected $table = 'role_requests';

    public static function createUpdate($params){

        $record= isset($params["id"])? self::find($params["id"]) :new self();
        $record->users_id = isset($params["users_id"])? $params["users_id"]: $record->users_id;
        $record->role_type_id = isset($params["role_type_id"])? $params["role_type_id"]: $record->role_type_id;
        isset($params["id"])?:$record->created_at = date("Y-m-d H:i:s");
        $record->save();
        return $record;
    }

}