<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class comments extends GeneralModel
{
    protected $table = 'comments';

    public static function createUpdate($params){

        $record= isset($params["id"])? self::find($params["id"]) :new self();
        $record->comment = isset($params["comment"])? $params["comment"]: $record->comment;
        $record->users_id = isset($params["users_id"])? $params["users_id"]: $record->users_id;
        $record->comments_id = isset($params["comments_id"])? $params["comments_id"]: $record->comments_id;
        $record->topics_id = isset($params["topics_id"])? $params["topics_id"]: $record->topics_id;
        $record->news_id = isset($params["news_id"])? $params["news_id"]: $record->news_id;
        $record->novels_id = isset($params["novels_id"])? $params["novels_id"]: $record->novels_id;
        isset($params["id"])?:$record->created_at = date("Y-m-d H:i:s");
        $record->save();
        return $record;
    }
    public function user(){
        return $this->belongsTo(users::class,"users_id");
    }
    public function novel(){
        return $this->belongsTo(novels::class,"novels_id");
    }
    public function topic(){
        return $this->belongsTo(topics::class,"topics_id");
    }
    public function news(){
        return $this->belongsTo(news::class,"news_id");
    }
    public function commentReplay(){
        return $this->belongsTo(comments::class,"comments_id");
    }
}