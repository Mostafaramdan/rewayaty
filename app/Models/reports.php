<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class reports extends GeneralModel
{
    protected $table = 'reports';

    public static function createUpdate($params){

        $record= isset($params["id"])? self::find($params["id"]) :new self();
        $record->users_id = isset($params["users_id"])? $params["users_id"]: $record->users_id;
        $record->reported_users_id = isset($params["reported_users_id"])? $params["reported_users_id"]: $record->reported_users_id;
        $record->novels_id = isset($params["novels_id"])? $params["novels_id"]: $record->novels_id;
        $record->news_id = isset($params["news_id"])? $params["news_id"]: $record->news_id;
        $record->topics_id = isset($params["topics_id"])? $params["topics_id"]: $record->topics_id;
        $record->message = isset($params["message"])? $params["message"]: $record->message;
        isset($params["id"])?:$record->created_at = date("Y-m-d H:i:s");
        $record->save();
        return $record;
    }
  
}