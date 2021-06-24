<?php
namespace App\Http\Controllers\Apis\Controllers\getEffects;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Controllers\Apis\Helper\helper;
use App\Http\Controllers\Apis\Controllers\index;
use App\Http\Controllers\Apis\Resources\objects;
use App\Models\effects;

class getEffectsController extends index
{
    public static function api(){

        $records=  effects::allActive();
        if(self::$request->effectId)
            $records = $records->where('id',self::$request->effectId);

        return [
            "status"=>$records->forPage(self::$request->page+1,self::$itemPerPage)->count()?200:204,
            "totalPages"=>ceil($records->count()/self::$itemPerPage),
            "effects"=>objects::ArrayOfObjects($records->forPage(self::$request->page+1,self::$itemPerPage),"effect"),
        ];
    }
}
