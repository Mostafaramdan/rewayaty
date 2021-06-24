<?php
namespace App\Http\Controllers\Apis\Controllers\getAuthers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Controllers\Apis\Helper\helper;
use App\Http\Controllers\Apis\Controllers\index;
use App\Http\Controllers\Apis\Resources\objects;
use App\Models\users;
use App\Models\novels;

class getAuthersController extends index
{
    public static function api(){

        $records=  users::allActive();
        if(self::$request->mostFamous == 1){
            $records= $records->sortbyDesc('mostFamous');
        }


        return [
            "status"=>$records->forPage(self::$request->page+1,self::$itemPerPage)->count()?200:204,
            "totalPages"=>ceil($records->count()/self::$itemPerPage),
            "users"=>objects::ArrayOfObjects($records->forPage(self::$request->page+1,self::$itemPerPage),"user"),
        ];
    }
}