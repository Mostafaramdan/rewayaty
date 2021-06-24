<?php
namespace App\Http\Controllers\Apis\Controllers\getMyLibrary;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Controllers\Apis\Helper\helper;
use App\Http\Controllers\Apis\Controllers\index;
use App\Http\Controllers\Apis\Resources\objects;
use App\Models\libraries;

class getMyLibraryController extends index
{
    public static function api(){

        $records=  libraries::where('users_id',self::$account->id)->get();
        return [
            "status"=>$records->forPage(self::$request->page+1,self::$itemPerPage)->count()?200:204,
            "totalPages"=>ceil($records->count()/self::$itemPerPage),
            "myLibrary"=>objects::ArrayOfObjects($records->forPage(self::$request->page+1,self::$itemPerPage),"library"),
        ];
    }
}
