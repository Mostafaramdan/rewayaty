<?php
namespace App\Http\Controllers\Apis\Controllers\addNovel;

use App\Http\Controllers\Apis\Controllers\index;
use App\Http\Controllers\Apis\Resources\objects;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Controllers\Apis\Helper\helper;

class addNovelRules extends index
{
    public static function rules ()
    {
        $rules=[
            "apiToken"                   =>"required|exists:users,apiToken",
            "isDraft"                    =>"in:0,1",
            "novel.backgroundId"         =>"exists:backgrounds,id",
            "novel.fontId"               =>"exists:fonts,id",
            "novel.musicId"              =>"exists:musics,id",
            "novel.effectId"             =>"exists:effects,id",
            "novel.name"                 =>"required",
            "novel.description"          =>"required",
            "novel.keywords"             =>"required",
            "novel.cover_image"          =>"required",
            "novel.categoryId"          =>"required|exists:categories,id",

            "novel.page"                 =>"required|array",
            "novel.page.*.number"        =>"required|numeric",
            "novel.page.*.image"         =>"nullable",
            "novel.page.*.text"          =>"required",
            "novel.page.*.backgroundId"  =>"exists:backgrounds,id",
            "novel.page.*.fontId"        =>"exists:fonts,id",
            "novel.page.*.musicId"       =>"exists:musics,id",
            "novel.page.*.effectId"      =>"exists:effects,id",
        ];

        $messages=[
            "apiToken.required"             =>400,
            "apiToken.exists"               =>405,

            "isDraft"                       =>405,

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

            "novel.page.required"             =>400,
            "novel.page.array"                =>405,

            "novel.page.array"                 =>405,

            "novel.page.*.backgroundId.required"=>400,
            "novel.page.*.backgroundId.exists"  =>405,

            "novel.page.*.fontId.required"      =>400,
            "novel.page.*.fontId.exists"        =>405,

            "novel.page.*.musicId.required"     =>400,
            "novel.page.*.musicId.exists"       =>405,

            "novel.page.*.effectId.required"    =>400,
            "novel.page.*.effectId.exists"      =>405,

            "novel.page.*.backgroundId.required"=>400,
            "novel.page.*.backgroundId.exists"  =>405,

            "novel.page.*.text.required"        =>405,

            "novel.page.*.number.required"      =>405,
            "novel.page.*.number.numeric"       =>405,

        ];

        $messagesAr=[   
            "apiToken.required"             =>"يجب إدخال التوكن",
            "apiToken.exists"               =>"توكن غير موجود",

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

            "novel.page.required"             =>"novel.page.required",
            "novel.page.array"                =>"novel.page.array",

            "novel.page.*.backgroundId.required"   =>"novel.page.*.backgroundId.required",
            "novel.page.*.backgroundId.exists"     =>"novel.page.*.backgroundId.exists",

            "novel.page.*.fontId.required"          =>"novel.page.*.fontId.required",
            "novel.page.*.fontId.exists"            =>"novel.page.*.fontId.exists",

            "novel.page.*.musicId.required"         =>"novel.page.*.musicId.required",
            "novel.page.*.musicId.exists"           =>"novel.page.*.musicId.exists",

            "novel.page.*.effectId.required"        =>"novel.page.*.effectId.required",
            "novel.page.*.effectId.exists"          =>"novel.page.*.effectId.exists",

            "novel.page.*.text.required"            =>"novel.page.*.text.required",

            "novel.page.*.number.required"           =>"novel.page.*.number.required",
            "novel.page.*.number.numeric"            =>"novel.page.*.number.numeric",


        ];

        $messagesEn=[
        ];
        $ValidationFunction=self::$request->showAllErrors==1?"showAllErrors":"Validator";
        $Validation = helper::{$ValidationFunction}(self::$request->all(), $rules, $messages,self::$lang=="ar"?$messagesAr:$messagesEn);
        if ($Validation !== null) {    return $Validation;    }

        return helper::validateAccount()??null;
    }
}
