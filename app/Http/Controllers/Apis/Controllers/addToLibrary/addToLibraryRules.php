<?php
namespace App\Http\Controllers\Apis\Controllers\addToLibrary;

use App\Http\Controllers\Apis\Controllers\index;
use App\Http\Controllers\Apis\Resources\objects;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Controllers\Apis\Helper\helper;

class addToLibraryRules extends index
{
    public static function rules (){
        
        $rules=[
            "apiToken"   =>"required|exists:users,apiToken",
            "novelId"     =>"exists:novels,id",
            "topicId"     =>"exists:topics,id",
        ];

        $messages=[
            "apiToken.required"     =>400,
            "apiToken.exists"       =>405,

            "novelId.exists"         =>405,

            "topicId.exists"         =>405,

        ];

        $messagesAr=[   
            "apiToken.required"     =>"يجب ادخال التوكن",
            "apiToken.exists"       =>"هذا التوكن غير موجود",

            "novelId.exists"         =>"رقم الرواية غير موجود",

            "topicId.exists"         =>"رقم الموضوع غير موجود",

        ];

        $messagesEn=[
        ];
        $ValidationFunction=self::$request->showAllErrors==1?"showAllErrors":"Validator";
        $Validation = helper::{$ValidationFunction}(self::$request->all(), $rules, $messages,self::$lang=="ar"?$messagesAr:$messagesEn);
        if ($Validation !== null) {    return $Validation;    }

        return helper::validateAccount()??null;
    }
}
