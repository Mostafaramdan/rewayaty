<?php
namespace App\Http\Controllers\Apis\Controllers\addComment;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Controllers\Apis\Helper\helper;
use App\Http\Controllers\Apis\Controllers\index;
use App\Http\Controllers\Apis\Resources\objects;
use App\Models\comments;

class addCommentController extends index
{
    public static function api(){

        $record=  comments::createUpdate([
            'users_id'=>self::$account->id,
            'comment' =>self::$request->comment,
            'comments_id' =>self::$request->commentId,
            'topics_id' =>self::$request->topicId,
            'news_id' =>self::$request->newsId,
            'novels_id' =>self::$request->novelId,
        ]);


        $ar= 'لديك تعليق جديد';
        $en= 'you have new comment';
        if($record->topics_id)
            $obj= ['key'=>'topics_id','val'=>$record->topics_id,'model'=>'topic','type'=>'TopicDetailsPage' ];
        if($record->novels_id)
            $obj= ['key'=>'novels_id','val'=>$record->novels_id ,'model'=>'novel','type'=>'RwayatyDetails' ];
        if($record->news_id)
            return ["status"=>200,];
        //     $obj= ['key'=>'news_id','val'=>$record->news_id ,'model'=>'news'];

        helper::newNotify([$record->{$obj['model']}->user],$ar,$en,$obj,$obj['type']);
        return [
            "status"=>200,
        ];
    }
}