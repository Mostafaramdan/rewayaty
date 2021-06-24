<?php
namespace App\Http\Controllers\Apis\Controllers\getNovels;

use App\Http\Controllers\Apis\Controllers\index;
use App\Http\Controllers\Apis\Resources\objects;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Controllers\Apis\Helper\helper;

class getNovelsRules extends index
{
    public static function rules (){
        
        $rules=[
            // "apiToken"   =>"required|exists:users,apiToken",
            "categoryId"     =>"exists:categories,id",
            "novelId"     =>"exists:novels,id",
            "mostFavorites"      =>"in:0,1",
            "mostRead"      =>"in:0,1",
            'page'          =>"required_if:novelId,|numeric"
        ];

        $messages=[
            "apiToken.required"     =>400,
            "apiToken.exists"       =>405,

            "novelId.exists"      =>405,

            "categoryId.exists"      =>405,

            "mostFavorites.in"       =>405,

            "mostRead.in"            =>405,

            "page.required_if"         =>400,
            "page.numeric"          =>405
        ];

        $messagesAr=[   
            "apiToken.required"     =>"يجب ادخال التوكن",
            "apiToken.exists"       =>"هذا التوكن غير موجود",

            "categoryId.required"       =>"يجب ادخال رقم القسم",

            "mostFavorites.in"          =>" يجب ادخال  الاكثر اعجابا بشكل صحيح 0 او 1  ",

            "mostRead.in"             =>" يجب ادخال  الاكثر زيارة بشكل صحيح 0 او 1  ",

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
