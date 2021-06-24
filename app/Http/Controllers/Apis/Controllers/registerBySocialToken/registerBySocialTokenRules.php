<?php
namespace App\Http\Controllers\Apis\Controllers\registerBySocialToken;

use App\Http\Controllers\Apis\Controllers\index;
use App\Http\Controllers\Apis\Resources\objects;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Controllers\Apis\Helper\helper;
use App\Models\regions;

class registerBySocialTokenRules extends index
{
    public static function rules (){

        $rules=[
            "name"     =>"required|min:3",
            "email"    =>"required_if:phone,|regex:/[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,6}/|unique:users,email",
            "phone"    =>"required_if:email,|numeric|between:1000000000,99999999999999999999|unique:users,phone",
            "lang"     =>"nullable|in:ar,en",
            "socialToken"=>"required"
        ];

        $messages=[
            "name.required"      =>400,
            "name.min"           =>405,

            "email.required_if"  =>400,
            "email.regex"        =>405,
            "email.min"          =>405,
            "email.unique"       =>409,

            "phone.required_if"  =>400,
            "phone.numeric"      =>405,
            "phone.between"      =>405,
            "phone.unique"       =>408,

            "regionId.required"  =>400,
            "regionId.exists"    =>405,

            "socialToken.required"  =>405,
            "socialToken.unique"       =>405,

            "lang.required"      =>400,
            "lang.in"            =>405,
        ];

        $messagesAr=[

            "name.required"     =>"يجب ادخال الاسم",
            "name.min"          =>"يجب ان لا يقل الاسم عن 3 حروف ",

            "email.required_if" =>"يجب ادخال رقم التليفون او البريد الالكتوني",
            "email.regex"       =>"يجب ادخال البريد الالكتروني بشكل صحيح",
            "email.min"         =>"يجب ان لا يقل البريد الالكتروني عن 5 حروف ",
            "email.unique"      =>"هذا البريد مسجل مسبقا",

            "phone.required_if" =>"يجب ادخال رقم التليفون او البريد الالكتروني",
            "phone.nemeric"     =>"يجب ادخال رقم التليفون بشكل صحيح ",
            "phone.between"     =>"يجب ان لا يقل رقم التليفون عن 11 ارقام ولا يزيد عن 15 رقم ",
            "phone.unique"      =>"هذا الهاتف مسجل مسبقا",
            
            "regionId.required" =>"يجب ادخال البلد ", 
            "regionId.exists"   =>"رقم المدينة غير مسجل في قاعدة البيانات",

            "socialToken.required" =>"يجب ادخال السوشيال توكن ",
            "socialToken.unique"      =>"هذا السوشيال توكن مسجل مسبقا",

            "isAndroid.required"=>"يجب ادخال نوع النظام التشغيل ",
            "isAndroid.in"      =>"يجب ادخال نوع النظام التشغيل بشكل صحيح",
        ];

        $messagesEn=[
            
        ];
        $ValidationFunction=self::$request->showAllErrors==1?'showAllErrors':'Validator';
        $Validation = helper::{$ValidationFunction}(self::$request->all(), $rules, $messages,self::$lang=="ar"?$messagesAr:$messagesEn);
        if ($Validation !== null) {    return $Validation;    }    

        if(regions::findActive(self::$request->regionId) &&
         regions::findActive(self::$request->regionId)->regions_id)
            return ['status'=>405,'message'=>self::$lang=="ar"?'هذه المدينة غير صالحة ادخل مدينة اخري':'invalid city, choose another city .'];
    }
}
