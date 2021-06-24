<?php
namespace App\Http\Controllers\Apis\Controllers\getComments;

use App\Http\Controllers\Apis\Controllers\index;
use App\Http\Controllers\Apis\Resources\objects;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Controllers\Apis\Helper\helper;

class getCommentsRules extends index
{
    public static function rules ()
    {
        $rules=[
            // "apiToken"   =>"required|exists:users,apiToken",
            "novelId"     =>"exists:novels,id",
            "topicId"     =>"exists:topics,id",
            "newsId"     =>"exists:news,id",

        ];

        $messages=[
            "apiToken.required"     =>400,
            "apiToken.exists"       =>405,

            "comment.required"    =>400,
            "comment.min"         =>405,

            "novelId.exists"         =>405,

            "topicId.exists"         =>405,

            "newsId.exists"         =>405,

        ];

        $messagesAr=[   
            "apiToken.required"     =>"يجب ادخال التوكن",
            "apiToken.exists"       =>"هذا التوكن غير موجود",

            "comment.min"         =>"يجب ان لا يقل التعليق عن 3 حروف",
            "comment.required"       =>"يجب ادخال التعليق ",

            "novelId.exists"         =>"رقم الرواية غير موجود",

            "topicId.exists"         =>"رقم الموضوع غير موجود",

            "newsId.exists"         =>"رقم الخبر غير موجود",


        ];

        $messagesEn=[
        ];
        $ValidationFunction=self::$request->showAllErrors==1?"showAllErrors":"Validator";
        $Validation = helper::{$ValidationFunction}(self::$request->all(), $rules, $messages,self::$lang=="ar"?$messagesAr:$messagesEn);
        if ($Validation !== null) {    return $Validation;    }

        return helper::validateAccount()??null;
    }

}
