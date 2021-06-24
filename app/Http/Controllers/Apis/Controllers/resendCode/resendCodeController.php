<?php

namespace App\Http\Controllers\Apis\Controllers\resendCode;
use  App\Http\Controllers\Apis\Controllers\index;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\sessions;
use App\Http\Controllers\Apis\Helper\helper ;

class resendCodeController extends index
{
    public static function api(){

        if(helper::chkifSendTwominute(self::$account->session)){ 
            $session= sessions::createUpdate([
                'id'=>self::$account->session->id,
                'code'=>helper::RandomXDigits(4),
                self::$account->getTable().'_id'=>index::$account->id
            ]);
            helper::sendSms( self::$account->phone, $session->code );
            return [
                'status'=>200,
                'message'=>self::$messages['resendCode']["200"],
            ];
        }else{
            return [
                'status'=>416,
                'message'=>self::$messages['resendCode']["416"],
            ];

        }
    }
}