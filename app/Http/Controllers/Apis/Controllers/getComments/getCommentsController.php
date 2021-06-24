<?php
namespace App\Http\Controllers\Apis\Controllers\getComments;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Controllers\Apis\Helper\helper;
use App\Http\Controllers\Apis\Controllers\index;
use App\Http\Controllers\Apis\Resources\objects;
use App\Models\comments;

class getCommentsController extends index
{
    public static function api()
    {
        if(self::$request->novelId){
            $key='novels_id';
            $value=self::$request->novelId;
        }elseif(self::$request->topicId){
            $key='topics_id';
            $value=self::$request->topicId;
        }elseif(self::$request->newsId){
            $key='news_id';
            $value=self::$request->newsId;
        }else{
            return [
                'status'=>400,
            ];
        }
        $records=  comments::where($key,$value)->orderBy('id','DESC')->get();
        $message="";
        return [
            "status"=>$records->forPage(self::$request->page+1,self::$itemPerPage)->count()?200:204,
            "totalPages"=>ceil($records->count()/self::$itemPerPage),
            "comments"=>objects::ArrayOfObjects($records->forPage(self::$request->page+1,self::$itemPerPage),"comment"),
        ];
    }
}
