<?php
namespace App\Http\Controllers\Apis\Controllers\getTopics;

use App\Http\Controllers\Apis\Controllers\index;
use App\Http\Controllers\Apis\Resources\objects;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Controllers\Apis\Helper\helper;

class getTopicsRules extends index
{
    public static function rules (){
        
        $rules=[
            // "apiToken"   =>"required|exists:users,apiToken",
            "categoryId"     =>"exists:categories,id",
            "topicId"     =>"exists:topics,id",
            'page'          =>"required_if:topicId,|numeric"
        ];

        $messages=[
            "apiToken.required"     =>400,
            "apiToken.exists"       =>405,

            "categoryId.exists"         =>405,

            "topicId.exists"         =>405,

            "page.required_if"         =>400,
            "page.numeric"          =>405
        ];

        $messagesAr=[   
            "apiToken.required"     =>"يجب ادخال التوكن",
            "apiToken.exists"       =>"هذا التوكن غير موجود",

            "categoryId.exists"      =>405,

            "page.required_if"         =>"يجب ادخال رقم الصفحة",
            "page.numeric"          =>"يجب ادخال رقم الصفحة بشكل صحيح",
        ];

        $messagesEn=[
        ];
        $ValidationFunction=self::$request->showAllErrors==1?"showAllErrors":"Validator";
        $Validation = helper::{$ValidationFunction}(self::$request->all(), $rules, $messages,self::$lang=="ar"?$messagesAr:$messagesEn);
        if ($Validation !== null) {    return $Validation;    }

        return helper::validateAccount()??null;
    }
}
