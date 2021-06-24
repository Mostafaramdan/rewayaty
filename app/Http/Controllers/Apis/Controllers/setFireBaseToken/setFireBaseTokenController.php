<?php
namespace App\Http\Controllers\Apis\Controllers\setFireBaseToken;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Controllers\Apis\Helper\helper;
use App\Http\Controllers\Apis\Controllers\index;
use App\Http\Controllers\Apis\Resources\objects;
use App\Models\users;

class setFireBaseTokenController extends index
{
    public static function api(){

        $record=  users::createUpdate([
            'id'=>self::$account->id,
            'fireBaseToken'=>self::$request->fireBaseToken
        ]);
        $message="";
        return [
            "status"=>200,
            "user"=>objects::user($record),
        ];
    }
}