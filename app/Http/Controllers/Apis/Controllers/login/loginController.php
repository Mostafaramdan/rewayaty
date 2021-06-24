<?php

namespace App\Http\Controllers\Apis\Controllers\login;
use  App\Http\Controllers\Apis\Controllers\index;
use App\Http\Controllers\Apis\Resources\objects;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\notifications;
use App\Http\Controllers\Apis\Helper\helper ;

class loginController extends index
{
    public static function api()
    {
        // 
        if( helper::login(index::$account,index::$request->password)){
            if(self::$request->has('lang'))
                self::$account->lang=self::$request->lang;
                self::$account->save();
            return  [
                'status'=>200,
                'account'=>objects::account( self::$account),
                'message'=>self::$messages['login']['200']
            ];
        }else{
            return [
                'status'=>406,
                'message'=>self::$messages['login']['406']
            ];
        }
    }
}