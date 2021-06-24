<?php
namespace App\Http\Controllers\Apis\Controllers\deleteComment;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Controllers\Apis\Helper\helper;
use App\Http\Controllers\Apis\Controllers\index;
use App\Http\Controllers\Apis\Resources\objects;
use App\Models\comments;

class deleteCommentController extends index
{
    public static function api(){

        $records=  comments::destroy(self::$request->commentId);
        return [
            "status"=>200,
            "message"=>"done"
        ];
    }
}