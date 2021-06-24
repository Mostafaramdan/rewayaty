<?php
namespace App\Http\Controllers\Apis\Controllers\getRoleType;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Controllers\Apis\Helper\helper;
use App\Http\Controllers\Apis\Controllers\index;
use App\Http\Controllers\Apis\Resources\objects;
use App\Models\role_type;

class getRoleTypeController extends index
{
    public static function api(){

        $records=  role_type::all();
        return [
            "status"=>$records->forPage(self::$request->page+1,self::$itemPerPage)->count()?200:204,
            "totalPages"=>ceil($records->count()/self::$itemPerPage),
            "role_type"=>objects::ArrayOfObjects($records->forPage(self::$request->page+1,self::$itemPerPage),"role_type"),
        ];
    }
}
