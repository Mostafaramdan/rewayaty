<?php
namespace App\Http\Controllers\Apis\Controllers\report;

use App\Http\Controllers\Apis\Controllers\index;
use App\Http\Controllers\Apis\Resources\objects;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Controllers\Apis\Helper\helper;

class reportRules extends index
{
    public static function rules (){
        
        $rules=[
            "apiToken"   =>"required|exists:users,apiToken",
            "message"   =>"required|min:10",
            "userId"     =>"exists:users,id",
            "novelId"     =>"exists:novels,id",
            "topicId"     =>"exists:topics,id",
            "newsId"     =>"exists:news,id",
            "commentId"     =>"exists:comments,id",
        ];

        $messages=[
            "apiToken.required"     =>400,
            "apiToken.exists"       =>405,

            "message.required"     =>400,
            "message.min"          =>405,

            "userId.exists"         =>405,

            "novelId.exists"         =>405,

            "topicId.exists"         =>405,

            "newsId.exists"         =>405,

            "commentId.exists"         =>405,
        ];

        $messagesAr=[   
            "apiToken.required"     =>"يجب ادخال التوكن",
            "apiToken.exists"       =>"هذا التوكن غير موجود",

            "message.required"     =>"يجب ادخال سبب البلاغ",
            "message.min"          =>"يجب ان لا يقل سبب البلاغ عن 10 حروف",

            "userId.exists"         =>"هذا الشخص غير موجود",

            "novelId.exists"         =>"هذه الرواية غير موجود",

            "topicId.exists"         =>"هذا الموضوع غير موجود",

            "newsId.exists"         =>"هذا الخبر غير موجود",

        ];

        $messagesEn=[
        ];
        $ValidationFunction=self::$request->showAllErrors==1?"showAllErrors":"Validator";
        $Validation = helper::{$ValidationFunction}(self::$request->all(), $rules, $messages,self::$lang=="ar"?$messagesAr:$messagesEn);
        if ($Validation !== null) {    return $Validation;    }

        return helper::validateAccount()??null;
    }
}
