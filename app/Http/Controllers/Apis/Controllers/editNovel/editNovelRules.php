<?php
namespace App\Http\Controllers\Apis\Controllers\editNovel;

use App\Http\Controllers\Apis\Controllers\index;
use App\Http\Controllers\Apis\Resources\objects;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Controllers\Apis\Helper\helper;

class editNovelRules extends index
{
    public static function rules ()
    {
        $rules=[
            "apiToken"                   =>"required|exists:users,apiToken",
            "novelId"                   =>"required|exists:novels,id",
            "isDraft"                    =>"in:0,1",
            "novel.backgroundId"         =>"exists:backgrounds,id",
            "novel.fontId"               =>"exists:fonts,id",
            "novel.musicId"              =>"exists:musics,id",
            "novel.effectId"             =>"exists:effects,id",
            "novel.name"                 =>"nullable",
            "novel.description"          =>"nullable",
            "novel.keywords"             =>"nullable",
            "novel.cover_image"          =>"nullable",
            "novel.categoryId"           =>"exists:categories,id",
            "novel.id"                   =>"exists:novels,id",
            "novel.isDraft"              =>"in:0,1",
        ];

        $messages=[
            "apiToken.required"             =>400,
            "apiToken.exists"               =>405,

            "isDraft"                       =>405,

            "novelId.required"             =>400,
            "novelId.exists"               =>405,

            "novel.backgroundId.required"   =>400,
            "novel.backgroundId.exists"     =>405,

            "novel.fontId.required"          =>400,
            "novel.fontId.exists"            =>405,

            "novel.musicId.required"         =>400,
            "novel.musicId.exists"           =>405,

            "novel.effectId.required"        =>400,
            "novel.effectId.exists"          =>405,

            "novel.backgroundId.required"    =>400,
            "novel.backgroundId.exists"      =>405,

            "novel.name.required"            =>400,
            
            "novel.description.required"     =>400,

            "novel.keywords.required"        =>400,

            "novel.cover_image.required"     =>400,

            "novel.categoryId.required"      =>400,
            "novel.categoryId.exists"        =>405,
            
            "novel.id.required"              =>400,
            "novel.id.exists"                =>405,

            "novel.isDraft.required"         =>400,
            "novel.isDraft.in"               =>405,

        ];
        

        $messagesAr=[   
            "apiToken.required"             =>"يجب إدخال التوكن",
            "apiToken.exists"               =>"توكن غير موجود",

            "apiToken.required"             =>"يجب إدخال رقم الرواية",
            "apiToken.exists"               =>"رقم الرواية غير موجود",

            "novel.backgroundId.required"   =>"يجب ادخال رقم خلفية الرواية",
            "novel.backgroundId.exists"     =>"novel.backgroundId",

            "novel.fontId.required"          =>"novel.fontId",
            "novel.fontId.exists"            =>"novel.fontId.exists",

            "novel.musicId.required"         =>"novel.musicId.required",
            "novel.musicId.exists"           =>"novel.musicId.exists",

            "novel.effectId.required"        =>"novel.effectId.required",
            "novel.effectId.exists"          =>"novel.effectId.exists",

            "novel.backgroundId.required"    =>"novel.backgroundId.required",
            "novel.backgroundId.exists"      =>"novel.backgroundId.exists",

            "novel.name.required"            =>"novel.name.required",
            
            "novel.description.required"     =>"novel.description.required",

            "novel.keywords.required"        =>"novel.keywords.required",

            "novel.cover_image.required"     =>"cover_image.required",

            "novel.categoryId.required"        =>"categoryId.required",
            "novel.categoryId.exists"          =>"categoryId.exists",
            
            "novel.id.required"              =>"id.required",
            "novel.id.exists"               =>"id.exists",

            "novel.isDraft.required"         =>"isDraft.required",
            "novel.isDraft.in"               =>"isDraft.in",


        ];

        $messagesEn=[
        ];
        $ValidationFunction=self::$request->showAllErrors==1?"showAllErrors":"Validator";
        $Validation = helper::{$ValidationFunction}(self::$request->all(), $rules, $messages,self::$lang=="ar"?$messagesAr:$messagesEn);
        if ($Validation !== null) {    return $Validation;    }

        return helper::validateAccount()??null;
    }

}
