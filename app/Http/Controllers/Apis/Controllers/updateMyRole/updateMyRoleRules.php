<?php
namespace App\Http\Controllers\Apis\Controllers\updateMyRole;

use App\Http\Controllers\Apis\Controllers\index;
use App\Http\Controllers\Apis\Resources\objects;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Controllers\Apis\Helper\helper;

class updateMyRoleRules extends index
{
    public static function rules (){
        
        $rules=[
            "apiToken"      =>"required|exists:users,apiToken",
            "role_typeId"     =>"required|exists:role_type,id",
        ];

        $messages=[
            "apiToken.required"     =>400,
            "apiToken.exists"       =>405,

            "role_typeId.required"     =>400,
            "role_typeId.exists"       =>405,

        ];

        $messagesAr=[   
            "apiToken.required"     =>"يجب ادخال التوكن",
            "apiToken.exists"       =>"هذا التوكن غير موجود",

            "role_typeId.exists"         =>" رقم العضوية غير موجود",
            "role_typeId.required"       =>"يجب إدخال رقم العضوية",

        ];

        $messagesEn=[
        ];
        $ValidationFunction=self::$request->showAllErrors==1?"showAllErrors":"Validator";
        $Validation = helper::{$ValidationFunction}(self::$request->all(), $rules, $messages,self::$lang=="ar"?$messagesAr:$messagesEn);
        if ($Validation !== null) {    return $Validation;    }

        return helper::validateAccount()??null;
    }
}
