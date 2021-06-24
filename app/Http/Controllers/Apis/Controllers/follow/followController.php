<?php
namespace App\Http\Controllers\Apis\Controllers\follow;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Controllers\Apis\Helper\helper;
use App\Http\Controllers\Apis\Controllers\index;
use App\Http\Controllers\Apis\Resources\objects;
use App\Models\followers;

class followController extends index
{
    public static function api(){

        $record=  followers::where('users_id',self::$account->id)
                            ->where('follow_users_id',self::$request->userId)
                            ->first();
        if($record){
            $action="unFollow";
            followers::where('users_id',self::$account->id)
                            ->where('follow_users_id',self::$request->userId)
                            ->delete();
        }else{
            followers::createUpdate([
                'users_id'=>self::$account->id,
                'follow_users_id'=>self::$request->userId
            ]);
            $action="follow";

        }
        return [
            "status"=>200,
            "action"=>$action,
        ];
    }
}
