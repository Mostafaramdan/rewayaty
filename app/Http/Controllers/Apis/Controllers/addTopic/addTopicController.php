<?php
namespace App\Http\Controllers\Apis\Controllers\addTopic;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Controllers\Apis\Helper\helper;
use App\Http\Controllers\Apis\Controllers\index;
use App\Http\Controllers\Apis\Resources\objects;
use App\Models\topics;

class addTopicController extends index
{
    public static function api(){

        $record=  topics::createUpdate([
            'users_id'=>self::$account->id,
            "title"  =>self::$request->title,
            'description' =>self::$request->description,
            'keywords' =>self::$request->keywords,
            'description' =>self::$request->description,
            'image' =>self::$request->image,
        ]);
        return [
            "status"=>200,
            "topic"=>objects::topic($record),
        ];
    }
}
