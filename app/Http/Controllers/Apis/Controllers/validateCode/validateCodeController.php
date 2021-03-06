<?php

namespace App\Http\Controllers\Apis\Controllers\validateCode;
use  App\Http\Controllers\Apis\Controllers\index;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Controllers\Apis\Helper\helper ;
use App\Models\sessions;
class validateCodeController extends index
{
    public static function api(){

        if(helper::isExpiredSession(self::$account->session,60))
            return [
                'status'=>410,
                'message'=>self::$messages['validateCode']["410"]
            ];

        // first Case :: Forget Password
        if (self::$request->has('phone')  || self::$request->has('email') ) {
                            
            self::$account->is_verified = 1;
            self::$account->save();
            sessions::whereIn('id',index::$account->sessions->pluck('id')->toArray())->delete();
            $key="apiToken"; 
            $value=self::$account->api_token;
        }   
        // Second Case :: Forget Password
        elseif (self::$request->has('tmpToken') ) {

            $key="tmpToken"; 
            $value=self::$account->session->tmp_token;
        }
        // Third Case :: Update Phone
        elseif (self::$request->has('apiToken')) {
            
            self::$account->session->tmp_phone?self::$account->phone=self::$account->session->tmp_phone:null;
            self::$account->session->tmp_email?self::$account->email=self::$account->session->tmp_email:null;
            self::$account->save();
            $key="phone"; 
            $value=self::$account->session->tmp_phone;
            sessions::whereIn('id',index::$account->sessions->pluck('id')->toArray())->delete();

        }

        return [
            'status'  => 200,
            $key      => $value,
            'message'=>self::$messages['validateCode']["200"]

        ];

    }
    
}
