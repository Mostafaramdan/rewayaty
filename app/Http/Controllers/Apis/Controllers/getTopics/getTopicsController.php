<?php
namespace App\Http\Controllers\Apis\Controllers\getTopics;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Controllers\Apis\Helper\helper;
use App\Http\Controllers\Apis\Controllers\index;
use App\Http\Controllers\Apis\Resources\objects;
use App\Models\topics;

class getTopicsController extends index
{
    public static function api(){

        $records=  topics::allActive();
        if(self::$request->topicId){
            return [
                "status"=>200,
                "topic"=>objects::topic(topics::find(self::$request->topicId)),
            ];
        }
        if(self::$request->categoryId){
            $records= $records->where('categories_id',self::$request->categories);
        }
        if(self::$request->userId){
            $records= $records->where('users_id',self::$request->userId);
        }

        return [
            "status"=>$records->forPage(self::$request->page+1,self::$itemPerPage)->count()?200:204,
            "totalPages"=>ceil($records->count()/self::$itemPerPage),
            "topics"=>objects::ArrayOfObjects($records->forPage(self::$request->page+1,self::$itemPerPage),"topic"),
        ];
    }
}
