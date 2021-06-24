<?php

namespace App\Models;
use App\Http\Controllers\Apis\Controllers\index;
use Illuminate\Database\Eloquent\Model;

class notify extends GeneralModel
{
    protected $table = 'notify',
    $appends=['content','user','type','target_user'];

    public static function createUpdate($params){

        $record= isset($params['id'])? self::find($params['id']) :new self();
        $record->notifications_id = $params['notifications_id']?? $record->notifications_id;
        $record->is_seen = isset($params['is_seen'])? $params['is_seen']: $record->is_seen;
        $record->users_id = isset($params['users_id'])? $params['users_id']: $record->users_id;
        isset($params['id'])?:$record->created_at = date("Y-m-d H:i:s");
        $record->save();
        return $record;
    }
    public function notification (){
        return $this->belongsTo('\App\Models\notifications','notifications_id');
    }
    
    public function user (){
        return $this->belongsTo(users::class,'users_id');
    }
    
    
    function GetTargetUserAttribute(){
        return $this->user ;
    }
    
}