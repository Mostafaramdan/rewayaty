<?php
namespace App\Http\Controllers\Apis\Controllers\getCurrentRole;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Controllers\Apis\Helper\helper;
use App\Http\Controllers\Apis\Controllers\index;
use App\Http\Controllers\Apis\Resources\objects;
use App\Models\role_type;

class getCurrentRoleController extends index
{
    public static function api(){

        $record=  self::$account->role->role_type??role_type::where('type','free')->first();
        return [
            "status"=>200,
            "role"=>objects::role_type($record),
        ];
    }
}