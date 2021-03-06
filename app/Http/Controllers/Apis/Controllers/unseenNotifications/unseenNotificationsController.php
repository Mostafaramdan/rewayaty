<?php

namespace App\Http\Controllers\Apis\Controllers\unseenNotifications;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Controllers\Apis\Helper\helper ;
use App\Http\Controllers\Apis\Controllers\index;
use App\Http\Controllers\Apis\Resources\objects;
use App\Models\notify;

class unseenNotificationsController extends index
{
    public static function api(){

        $unseen=  notify::where(self::$account->getTable().'_id',self::$account->id)->where('is_seen',0)->count();
        return [
            "status"=>200,
            "unseen"=>$unseen
        ];
    }
}