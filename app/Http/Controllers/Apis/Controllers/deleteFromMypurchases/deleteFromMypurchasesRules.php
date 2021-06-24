<?php
namespace App\Http\Controllers\Apis\Controllers\deleteFromMypurchases;

use App\Http\Controllers\Apis\Controllers\index;
use App\Http\Controllers\Apis\Resources\objects;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Controllers\Apis\Helper\helper;

class deleteFromMypurchasesRules extends index
{
    public static function rules ()
    {
        $rules=[
            "apiToken"     =>"required|exists:users,apiToken",
            "fontId"       =>"exists:fonts,id",
            "musciId"      =>"exists:muscis,id",
            "effectId"     =>"exists:effects,id",
            "backgroundId" =>"exists:backgrounds,id",
        ];

        $messages=[
            "apiToken.required"     =>400,
            "apiToken.exists"       =>405,

            "fontId.exists"          =>405,
            "musciId.exists"         =>405,
            "effectId.exists"         =>405,
            "backgroundsId.exists"    =>405,

            "page.required"         =>400,
            "page.numeric"          =>405
        ];

        $messagesAr=[   
            "apiToken.required"     =>"يجب ادخال التوكن",
            "apiToken.exists"       =>"هذا التوكن غير موجود",

            "fontId.exists"          =>"رقم الخط غير موجود",
            "musciId.exists"         =>"رقم الموسيقي غير موجود",
            "effectId.exists"         =>"رقم التأثير غير موجود",
            "backgroundsId.exists"    =>"رقم الخلفية غير موجود",
        ];

        $messagesEn=[
        ];
        $ValidationFunction=self::$request->showAllErrors==1?"showAllErrors":"Validator";
        $Validation = helper::{$ValidationFunction}(self::$request->all(), $rules, $messages,self::$lang=="ar"?$messagesAr:$messagesEn);
        if ($Validation !== null) {    return $Validation;    }

        return helper::validateAccount()??null;
    }

}
