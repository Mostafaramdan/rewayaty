<?php
namespace App\Http\Controllers\Apis\Controllers\editNovel;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Controllers\Apis\Helper\helper;
use App\Http\Controllers\Apis\Controllers\index;
use App\Http\Controllers\Apis\Resources\objects;
use App\Models\novels;

class editNovelController extends index
{
    public static function api(){

        $novel = novels::find(self::$request->novelId);
        $record=  novels::createUpdate([
            'id'=>$novel->id,
            'name'=>self::$request->novel['name']??$novel->name,
            'description'=>self::$request->novel['description']??$novel->description,
            'cover_image'=>self::$request->novel['cover_image']??$novel->cover_image,
            'categories_id'=>self::$request->novel['categoryId']??$novel->categories_id,
            'musics_id'=>self::$request->novel['musicId']??$novel->musicId,
            'effects_id'=>self::$request->novel['effectId']??$novel->effectId,
            'backgrounds_id'=>self::$request->novel['backgroundId']??$novel->backgroundId,
            'fonts_id'=>self::$request->novel['fontId']??$novel->fontId,
            'keywords'=>self::$request->novel['keywords']??$novel->keywords,
            "users_id"=>self::$account->id??null,
        ]);        
        $record->is_draft= self::$request->isDraft;
        $record->save();
        return [
            "status"=>200,
            "novels"=>objects::novel($record),
        ];
    }
}