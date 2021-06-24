<?php
namespace App\Http\Controllers\Apis\Controllers\loginBySocialToken;

use App\Http\Controllers\Apis\Controllers\index;
use App\Http\Controllers\Apis\Resources\objects;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Controllers\Apis\Helper\helper;
use App\Models\users;

class loginBySocialTokenRules extends index
{
    public static function rules ()
    {
        $rules=[
            "socialToken" =>"required",
            "email" =>"required|exists:users,email",
        ];

        $messages=[
            "email.required"  =>400,
            "email.exists"       =>405,

            "socialToken.required"  =>400,

        ];

        $messagesAr=[   
            "email.required_if" =>"يجب ادخال رقم التليفون او البريد الالكتوني",
            "email.regex"       =>"يجب ادخال البريد الالكتروني بشكل صحيح",
            "email.min"         =>"يجب ان لا يقل البريد الالكتروني عن 5 حروف ",

            "phone.required_if" =>"يجب ادخال رقم التليفون او البريد الالكتروني",
            "phone.numeric"     =>"يجب ادخال رقم التليفون بشكل صحيح",
            "phone.between"     =>"يجب ان لا يقل رقم التليفون عن 11 ارقام ولا يزيد عن 15 رقم ",

            "socialToken.required" =>"يجب ادخال السوشيال توكن ",
            "socialToken.exists" =>"سوشيال توكن غير موجود",

            "isAndroid.required"=>"يجب ادخال نوع النظام التشغيل ",
            "isAndroid.in"      =>"يجب ادخال نوع النظام التشغيل بشكل صحيح",
        ];

        $messagesEn=[
            
        ];
        $ValidationFunction=self::$request->showAllErrors==1?'showAllErrors':'Validator';
        $Validation = helper::{$ValidationFunction}(self::$request->all(), $rules, $messages,self::$lang=="ar"?$messagesAr:$messagesEn);
        if ($Validation !== null) {    return $Validation;    }
        if(self::$request->email){
            self::$account=users::where('email',self::$request->email)->first();
        }
        return helper::validateAccount()??null;
    }
}