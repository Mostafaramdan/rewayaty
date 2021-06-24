<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class followers extends GeneralModel
{
    protected $table = 'followers';

    public static function createUpdate($params)
    {
        $record= isset($params["id"])? self::find($params["id"]) :new self();
        $record->users_id = isset($params["users_id"])? $params["users_id"]: $record->users_id;
        $record->follow_users_id = isset($params["follow_users_id"])? $params["follow_users_id"]: $record->follow_users_id;
        isset($params["id"])?:$record->created_at = date("Y-m-d H:i:s");
        $record->save();
        return $record;
    }

}