<?php
namespace App\Http\Controllers\Apis\Controllers\addComment;

use App\Http\Controllers\Apis\Controllers\index;
use App\Http\Controllers\Apis\Resources\objects;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Controllers\Apis\Helper\helper;

class addCommentRules extends index
{
    public static function rules ()
    {
        
        $rules=[
            "apiToken"   =>"required|exists:users,apiToken",
            "comment"     =>"required|min:3",
            "novelId"     =>"exists:novels,id",
            "topicId"     =>"exists:topics,id",
            "newsId"     =>"exists:news,id",
            "commentId"     =>"exists:comments,id",

        ];

        $messages=[
            "apiToken.required"     =>400,
            "apiToken.exists"       =>405,

            "comment.required"    =>400,
            "comment.min"         =>405,

            "novelId.exists"         =>405,

            "topicId.exists"         =>405,

            "newsId.exists"         =>405,

            "commentId.exists"         =>405,

        ];

        $messagesAr=[   
            "apiToken.required"     =>"يجب ادخال التوكن",
            "apiToken.exists"       =>"هذا التوكن غير موجود",

            "comment.min"         =>"يجب ان لا يقل التعليق عن 3 حروف",
            "comment.required"       =>"يجب ادخال التعليق ",

            "novelId.exists"         =>"رقم الرواية غير موجود",

            "topicId.exists"         =>"رقم الموضوع غير موجود",

            "newsId.exists"         =>"رقم الخبر غير موجود",

            "commentId.exists"         =>"رقم التعليق غير موجود",

        ];

        $messagesEn=[
        ];
        $ValidationFunction=self::$request->showAllErrors==1?"showAllErrors":"Validator";
        $Validation = helper::{$ValidationFunction}(self::$request->all(), $rules, $messages,self::$lang=="ar"?$messagesAr:$messagesEn);
        if ($Validation !== null) {    return $Validation;    }

        return helper::validateAccount()??null;
    }
}
