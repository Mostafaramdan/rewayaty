<?php
namespace App\Http\Controllers\Apis\Controllers\getMusics;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Controllers\Apis\Helper\helper;
use App\Http\Controllers\Apis\Controllers\index;
use App\Http\Controllers\Apis\Resources\objects;
use App\Models\musics;

class getMusicsController extends index
{
    public static function api(){

        $records=  musics::allActive();
        if(self::$request->musicId)
            $records = $records->where('id',self::$request->musicId);

        return [
            "status"=>$records->forPage(self::$request->page+1,self::$itemPerPage)->count()?200:204,
            "totalPages"=>ceil($records->count()/self::$itemPerPage),
            "musics"=>objects::ArrayOfObjects($records->forPage(self::$request->page+1,self::$itemPerPage),"music"),
        ];
    }
}
