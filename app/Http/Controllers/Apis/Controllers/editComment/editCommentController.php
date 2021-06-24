<?php
namespace App\Http\Controllers\Apis\Controllers\editComment;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Controllers\Apis\Helper\helper;
use App\Http\Controllers\Apis\Controllers\index;
use App\Http\Controllers\Apis\Resources\objects;
use App\Models\comments;

class editCommentController extends index
{
    public static function api(){

        $records=  comments::createUpdate([
            "id"=>self::$request->commentId,
            "comment"=>self::$request->comment,
        ]);
        return [
            "status"=>200,
            "message"=>"done"
        ];
    }
}