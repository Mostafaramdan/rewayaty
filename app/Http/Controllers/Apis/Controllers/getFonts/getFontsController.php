<?php
namespace App\Http\Controllers\Apis\Controllers\getFonts;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Controllers\Apis\Helper\helper;
use App\Http\Controllers\Apis\Controllers\index;
use App\Http\Controllers\Apis\Resources\objects;
use App\Models\fonts;

class getFontsController extends index
{
    public static function api(){

        $records=  fonts::allActive();
        if(self::$request->fontId)
        $records = $records->where('id',self::$request->fontId);

        return [
            "status"=>$records->forPage(self::$request->page+1,self::$itemPerPage)->count()?200:204,
            "totalPages"=>ceil($records->count()/self::$itemPerPage),
            "fonts"=>objects::ArrayOfObjects($records->forPage(self::$request->page+1,self::$itemPerPage),"font"),
        ];
    }
}
