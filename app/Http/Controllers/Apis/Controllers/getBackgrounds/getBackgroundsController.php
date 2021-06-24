<?php
namespace App\Http\Controllers\Apis\Controllers\getBackgrounds;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Controllers\Apis\Helper\helper;
use App\Http\Controllers\Apis\Controllers\index;
use App\Http\Controllers\Apis\Resources\objects;
use App\Models\backgrounds;

class getBackgroundsController extends index
{
    public static function api(){

        $records=  backgrounds::allActive();
        if(self::$request->backgroundId)
            $records = $records->where('id',self::$request->backgroundId);
        return [
            "status"=>$records->forPage(self::$request->page+1,self::$itemPerPage)->count()?200:204,
            "totalPages"=>ceil($records->count()/self::$itemPerPage),
            "backgrounds"=>objects::ArrayOfObjects($records->forPage(self::$request->page+1,self::$itemPerPage),"background"),
        ];
    }
}
