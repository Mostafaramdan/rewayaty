<?php

namespace App\Http\Controllers\Apis\Controllers\register;

use App\Http\Controllers\Apis\Helper\helper ;
use App\Http\Controllers\Apis\Resources\objects;
use App\Http\Controllers\Apis\Controllers\index;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\sessions;
use App\Models\users;
use App\Models\roles;

class registerController extends index
{    
    public static function api ()
    {
       
        $request=self::$request;
        $record= users::createUpdate([
                    'name'=>$request->name,
                    'email'=>$request->email,
                    'phone'=>$request->phone,
                    'lang'=>$request->lang,
                    'image'=>$request->image,
                    'password'=>$request->password,
                    'image'=>$request->image,  
                    'regions_id'=>$request->regionId,  
                    'lang'=>$request->lang, 
                    'isAndroid'=>$request->isAndroid,
                    'fireBaseToken'=>$request->fireBaseToken,
                ]);
        $session = sessions::createUpdate([
                $record->getTable().'_id' =>$record->id,
                'code'=>helper::RandomXDigits(4)
            ]);
        if($request->phone)
            helper::sendSms( $record->phone, $session->code );
        roles::createUpdate([
            'start_at'=>date('Y-m-d'),
            'end_at'=>date('Y-m-d',strtotime('+30 days',strtotime(date('Y-m-d') ) ) ),
            'given_users_id'=>$record->id,
            'role_type_id'=>1,

        ]);
        // if($request->email)
        //     app('Mail')::to($record->email)->send(new  App\Mail\sendCode($session->code));

        return [
            'status'=>200,
            'message'=>self::$messages['register']["200"],
            'account'=>objects::account( $record)
        ];
    }
}