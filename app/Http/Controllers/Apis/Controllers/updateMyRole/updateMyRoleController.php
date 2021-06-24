<?php
namespace App\Http\Controllers\Apis\Controllers\updateMyRole;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Controllers\Apis\Helper\helper;
use App\Http\Controllers\Apis\Controllers\index;
use App\Http\Controllers\Apis\Resources\objects;
use App\Models\role_requests;

class updateMyRoleController extends index
{
    public static function api()
    {

        role_requests::where('users_id',self::$account->id)->delete();
        $records=  role_requests::createUpdate([
            'users_id'=>self::$account->id,
            'role_type_id'=>self::$request->role_typeId
        ]);
        return [
            "status"=>200,
        ];
    }
}