<?php
namespace App\Http\Controllers\Apis\Controllers\getAds;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Controllers\Apis\Helper\helper;
use App\Http\Controllers\Apis\Controllers\index;
use App\Http\Controllers\Apis\Resources\objects;
use App\Models\ads;

class getAdsController extends index
{
    public static function api()
    {
        // return '2020-06-30'> date("Y-m-d");
        $records=  ads::allActiveOnly()
                      ->where('end_at','>',date("Y-m-d"))
                      ->where('start_at','<=',date("Y-m-d"))
                      ->where('type',self::$request->type)
                    ;
        if(self::$request->novelId){
            $records= $records->where('novels_id',self::$request->novelId);
        }
        if(self::$request->topicId){
            $records= $records->where('topics_id',self::$request->topicId);
        }
        return [
            'status'=>$records->count()?200:204,
            'ads'=>objects::ArrayOfObjects($records->forPage(0,20) ,'ad'),
        ];
    }
}