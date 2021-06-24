<?php
namespace App\Http\Controllers\Apis\Controllers\addToLibrary;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Controllers\Apis\Helper\helper;
use App\Http\Controllers\Apis\Controllers\index;
use App\Http\Controllers\Apis\Resources\objects;
use App\Models\libraries;

class addToLibraryController extends index
{
    public static function api(){

      
        if(self::$request->novelId){
            $library = libraries::where('novels_id',self::$request->novelId)->where('users_id',self::$account->id)->first();
            if($library){
                $library->delete();
                $action= "delete";
            }else{
                libraries::createUpdate([
                    'users_id'=>self::$account->id,
                    'novels_id'=>self::$request->novelId,
                ]);
                $action= "add";
            }
       }else{
        $library = libraries::where('topics_id',self::$request->topicId)->where('users_id',self::$account->id)->first();
            if($library){
                $library->delete();
                $action= "delete";
            }else{
                libraries::createUpdate([
                    'users_id'=>self::$account->id,
                    'topics_id'=>self::$request->topicId,
                ]);
                $action= "add";
            }
       }
        return [
            "status"=>200,
            "action"=>$action,
        ];
    }
}
