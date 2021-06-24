<?php
namespace App\Http\Controllers\Apis\Controllers\getAds;

use App\Http\Controllers\Apis\Controllers\index;
use App\Http\Controllers\Apis\Resources\objects;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Controllers\Apis\Helper\helper;

class getAdsRules extends index
{
    public static function rules (){
        
        $rules=[
            // "apiToken"  =>"required",
            // "page"      =>"required|numeric"
            "type"      =>"required|in:home,novels,topics",
            "novelId"      =>"exists:novels,id",
            "topicId"      =>"exists:topics,id",
        ];

        $messages=[
            "type.required"         =>400,
            "type.in"               =>405,

            "novelId.required"         =>400,
            "novelId.exists"          =>405,

            "topicId.required"         =>400,
            "topicId.exists"          =>405
        ];

        $messagesAr=[   
            
        ];

        $messagesEn=[
        ];
        $ValidationFunction=self::$request->showAllErrors==1?"showAllErrors":"Validator";
        $Validation = helper::{$ValidationFunction}(self::$request->all(), $rules, $messages,$messagesEn);
        if ($Validation !== null) {    return $Validation;    }
        return helper::validateAccount()??null;
    }
}