<?php

namespace App\Http\Controllers\Apis\Controllers\appinfo;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Controllers\Apis\Helper\helper ;

use App\Http\Controllers\Apis\Controllers\index;
use App\Http\Controllers\Apis\Resources\objects;
use App\Models\app_settings;

class appinfoController extends index
{
    public static function api()
    {
        $records =  app_settings::first();
        return [
            "status"=>200,
            "appInfo"=>objects::AppInfo($records),
        ];
    }
}