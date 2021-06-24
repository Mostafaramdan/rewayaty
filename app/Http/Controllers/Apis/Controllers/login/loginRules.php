<?php

namespace App\Http\Controllers\Apis\Controllers\login;

use App\Http\Controllers\Apis\Controllers\index;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Controllers\Apis\Helper\helper ;
class loginRules extends index
{    

    public static function rules (){
        
        $rules=[
            "phone"    =>"numeric|between:10000000,999999999999999",
            "password" =>"required|min:6|max:20",
            "lang"     =>"in:ar,en",
        ];

        $messages=[
            "lang.in"            =>405,

            "type.required"      =>400,
            "type.in"            =>405,

            "phone.required"     =>400,
            "phone.numeric"      =>405,
            "phone.between"      =>405,

            "password.required"  =>400,
            "password.min"       =>405,
            "password.max"       =>405,

            "isAndroid.required" =>405,
            "isAndroid.in"       =>405
        ];

        $messagesAr=[   
            "type.required"     =>"يجب ادخال نوع المستخدم",
            "type.in"           =>" users Or Providers يجب ان يكون النوع  ",

            "phone.required_if" =>"يجب ادخال رقم التليفون او البريد الالكتروني",
            "phone.numeric"     =>"يجب ادخال رقم التليفون بشكل صحيح",
            "phone.between"     =>"يجب ان لا يقل رقم التليفون عن 11 ارقام ولا يزيد عن 15 رقم ",

            "password.required"  =>"يجب ادخال الرقم السري ",
            "password.min"       =>"يجب ان لا يقل الرقم السري عن 6 حروف وارقام",
            "password.max"       =>"يجب ان لا يزيد الرقم السري عن 20 حرف",

            "isAndroid.required"=>"يجب ادخال نوع النظام التشغيل ",
            "isAndroid.in"      =>"يجب ادخال نوع النظام التشغيل بشكل صحيح",
        ];

        $messagesEn=[
            
        ];
        $ValidationFunction=self::$request->showAllErrors==1?'showAllErrors':'Validator';
        $Validation = helper::{$ValidationFunction}(self::$request->all(), $rules, $messages,self::$lang=="ar"?$messagesAr:$messagesEn);
        if ($Validation !== null) {    return $Validation;    }

        return helper::validateAccount()??null;
    }

}
