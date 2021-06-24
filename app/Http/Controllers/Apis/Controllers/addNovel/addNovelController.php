<?php
namespace App\Http\Controllers\Apis\Controllers\addNovel;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Controllers\Apis\Helper\helper;
use App\Http\Controllers\Apis\Controllers\index;
use App\Http\Controllers\Apis\Resources\objects;
use App\Models\novels;
use App\Models\pages;

class addNovelController extends index
{
    public static function api(){

        $record=  novels::createUpdate([
            'name'=>self::$request->novel['name'],
            'description'=>self::$request->novel['description'],
            'cover_image'=>self::$request->novel['cover_image'],
            'categories_id'=>self::$request->novel['categoryId'],
            'musics_id'=>self::$request->novel['musicId']??null,
            'effects_id'=>self::$request->novel['effectId']??null,
            'backgrounds_id'=>self::$request->novel['backgroundId']??null,
            'fonts_id'=>self::$request->novel['fontId']??null,
            'keywords'=>self::$request->novel['keywords'],
            "users_id"=>self::$account->id,
            "is_draft"=>self::$request->isDraft??0
        ]);
        foreach(self::$request->novel['page'] as $page){
            $page=  pages::createUpdate([
                'text'=>$page['text'],
                'number'=>$page['number'],
                'image'=>$page['image']??null,
                'novels_id'=>$record->id,
                'musics_id'=>$page['musicId']??null,
                'effects_id'=>$page['effectId']??null,
                'backgrounds_id'=>$page['backgroundId']??null,
                'image'=>$page['image']??null,
                'fonts_id'=>$page['fontId']??null,
            ]);
        }
        return [
            "status"=>200,
            "novel"=>objects::novel($record),
        ];
    }
}
