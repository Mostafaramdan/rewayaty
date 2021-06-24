<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Http\Controllers\Apis\Controllers\index;

class notifications extends GeneralModel
{
    protected $table = 'notifications',$appends=['notification_type','item'];
    public static function createUpdate($params){

        $record= isset($params['id'])? self::find($params['id']) :new self();
        $record->content_ar = isset($params['content_ar'])?$params['content_ar']: $record->content_ar;
        $record->content_en = isset($params['content_en'])?$params['content_en']: $record->content_en;
        $record->type = isset($params['type'])?$params['type']: $record->type;
        $record->novels_id = isset($params['novels_id'])?$params['novels_id']: $record->novels_id;
        $record->topics_id = isset($params['topics_id'])?$params['topics_id']: $record->topics_id;
        $record->users_id = isset($params['users_id'])?$params['users_id']: $record->users_id;
        isset($params['id'])?:$record->created_at = date("Y-m-d H:i:s");
        $record->save();
        return $record;
    }
    function GetItemAttribute()
    {
        if($this->news_id)
            return  $this->news_id;
        if($this->novels_id)
            return  $this->novels_id;
        if($this->topics_id)
            return  $this->topics_id;
    }
     public function notify(){
        return $this->hasMany('\App\Models\notify','notifications_id');
    }
     function GetNotificationTypeAttribute(){
        $notify =notify::where('notifications_id',$this->id)->get();
        if($notify->count()==0 || !$notify->first()->target_user)
            return null;
        $firstType =  $notify->first()->target_user->type;
        foreach($notify as $n){
            if (!$n->target_user || $firstType != $n->target_user->type)
                return null;
        }
        return  $firstType;
    }
}