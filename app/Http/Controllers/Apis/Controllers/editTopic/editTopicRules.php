<?php
namespace App\Http\Controllers\Apis\Controllers\editTopic;

use App\Http\Controllers\Apis\Controllers\index;
use App\Http\Controllers\Apis\Resources\objects;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Controllers\Apis\Helper\helper;

class editTopicRules extends index
{
    public static function rules (){
        
        $rules=[
            "apiToken"      =>"required|exists:users,apiToken",
            "topicId"         =>"required|exists:users,topics",
            "title"         =>"nullable",
            "image"         =>"nullable",
            "description"   =>"nullable"
        ];

        $messages=[
            "apiToken.required"     =>400,
            "apiToken.exists"       =>405,

            "topicId.required"      =>400,
            "topicId.exists"        =>405,

            "title.required"        =>400,

            "image.required"        =>400,

            "description.required"         =>400,
        ];

        $messagesAr=[   
            "apiToken.required"     =>"يجب ادخال التوكن",
            "apiToken.exists"       =>"هذا التوكن غير موجود",

            "topicId.required"      =>"topicId.required",
            "topicId.exists"        =>"topicId.exists",

            "title.required"       =>"يجب ادخال عنوان الموضوع",

            "image.required"       =>"يجب ادخال صورة الموضوع",

            "description.required" =>"يجب ادخال وصف الموضوع",
        ];

        $messagesEn=[
        ];
        $ValidationFunction=self::$request->showAllErrors==1?"showAllErrors":"Validator";
        $Validation = helper::{$ValidationFunction}(self::$request->all(), $rules, $messages,self::$lang=="ar"?$messagesAr:$messagesEn);
        if ($Validation !== null) {    return $Validation;    }

        return helper::validateAccount()??null;
    }
}
