<?php
namespace App\Http\Controllers\Apis\Controllers\addEditPage;

use App\Http\Controllers\Apis\Controllers\index;
use App\Http\Controllers\Apis\Resources\objects;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Controllers\Apis\Helper\helper;

class addEditPageRules extends index
{
    public static function rules ()
    {
        $rules=[
            "apiToken"             =>"required|exists:users,apiToken",
            "novelId"               =>"required|exists:novels,id",
            "pages"                  =>"required|array",
            "pages.*.id"             =>"exists:pages,id",
            "pages.*.number"        =>"required|numeric",
            "pages.*.text"          =>"nullable",
            "pages.*.backgroundId"  =>"exists:backgrounds,id",
            "pages.*.fontId"        =>"exists:fonts,id",
            "pages.*.musicId"       =>"exists:musics,id",
            "pages.*.effectId"      =>"exists:effects,id",
        ];

        $messages=[
            "apiToken.required"             =>400,
            "apiToken.exists"               =>405,

            "novelId.required"            =>400,
            "novelId.exists"            =>400,

            "page.*.id.required"            =>400,
            "page.*.backgroundId.required"  =>400,
            "page.*.backgroundId.exists"    =>405,

            "page.*.fontId.required"      =>400,
            "page.*.fontId.exists"        =>405,

            "page.*.musicId.required"     =>400,
            "page.*.musicId.exists"       =>405,

            "page.*.effectId.required"    =>400,
            "page.*.effectId.exists"      =>405,

            "page.*.backgroundId.required"=>400,
            "page.*.backgroundId.exists"  =>405,

            "page.*.text.required"        =>405,

            "page.*.number.required"      =>405,
            "page.*.number.numeric"       =>405,

        ];

        $messagesAr=[   
            "apiToken.required"             =>"يجب إدخال التوكن",
            "apiToken.exists"               =>"توكن غير موجود",

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
