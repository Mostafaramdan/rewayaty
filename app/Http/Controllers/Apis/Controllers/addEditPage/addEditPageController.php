<?php
namespace App\Http\Controllers\Apis\Controllers\addEditPage;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Controllers\Apis\Helper\helper;
use App\Http\Controllers\Apis\Controllers\index;
use App\Http\Controllers\Apis\Resources\objects;
use App\Models\pages;

class addEditPageController extends index
{
    public static function api(){

        // $test= null;
        // return isset($test);
        $pages= self::$request->pages;
        foreach($pages as $page){
            $page=  pages::createUpdate([
                isset($page['id'])?'id':null=>$page['id']??null,
                'text'=>$page['text']??null,
                'number'=>$page['number']??null,
                'novels_id'=>self::$request->novelId,
                'musics_id'=>$page['musicId']??null,
                'effects_id'=>$page['effectId']??null,
                'backgrounds_id'=>$page['backgroundId']??null,
                'image'=>$page['image']??null,
                'fonts_id'=>$page['fontId']??null,
            ]);
        }
        return [
            "status"=>200
        ];
    }
}