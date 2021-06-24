<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class roles extends GeneralModel
{
    protected $table = 'roles';

    public static function createUpdate($params){

        $record= isset($params["id"])? self::find($params["id"]) :new self();
        $record->start_at = isset($params["start_at"])? $params["start_at"]: $record->start_at;
        $record->end_at = isset($params["end_at"])? $params["end_at"]: $record->end_at;
        $record->giver_admins_id = isset($params["giver_admins_id"])? $params["giver_admins_id"]: $record->giver_admins_id;
        $record->given_users_id = isset($params["given_users_id"])? $params["given_users_id"]: $record->given_users_id;
        $record->role_type_id = isset($params["role_type_id"])? $params["role_type_id"]: $record->role_type_id;
        isset($params["id"])?:$record->created_at = date("Y-m-d H:i:s");
        $record->save();
        return $record;
    }
    public function role_type(){
        return $this->belongsTo(role_type::class,"role_type_id");
    }
}