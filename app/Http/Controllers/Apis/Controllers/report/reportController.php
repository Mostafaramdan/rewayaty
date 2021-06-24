<?php
namespace App\Http\Controllers\Apis\Controllers\report;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Controllers\Apis\Helper\helper;
use App\Http\Controllers\Apis\Controllers\index;
use App\Http\Controllers\Apis\Resources\objects;
use App\Models\reports;

class reportController extends index
{
    public static function api(){

        $records=  reports::createUpdate([
            'users_id'=>self::$account->id,
            'reported_users_id'=>self::$request->userId,
            'novels_id'=>self::$request->novelId,
            'news_id'=>self::$request->newsId,
            'topics_id'=>self::$request->topicId,
            'comments_id'=>self::$request->commentId,
            'message'=>self::$request->message,
        ]);
        return [
            "status"=>200,
            "message"=>"done"
        ];
    }
}