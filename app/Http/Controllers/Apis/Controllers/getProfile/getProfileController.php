<?php
namespace App\Http\Controllers\Apis\Controllers\getProfile;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Controllers\Apis\Helper\helper;
use App\Http\Controllers\Apis\Controllers\index;
use App\Http\Controllers\Apis\Resources\objects;
use App\Models\users;

class getProfileController extends index
{
    public static function api(){

        $record=  users::find(self::$request->userId);
        return [
            "status"=>200,
            "user"=>objects::user($record),
        ];
    }
}