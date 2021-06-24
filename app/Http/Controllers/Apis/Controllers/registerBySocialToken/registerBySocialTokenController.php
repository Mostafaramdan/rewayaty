<?php
namespace App\Http\Controllers\Apis\Controllers\registerBySocialToken;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Controllers\Apis\Helper\helper;
use App\Http\Controllers\Apis\Controllers\index;
use App\Http\Controllers\Apis\Resources\objects;
use App\Models\users;

class registerBySocialTokenController extends index
{
    public static function api()
    {
        $request=self::$request;
        $record= users::createUpdate([
            'name'=>$request->name,
            'email'=>$request->email,
            'lang'=>$request->lang,
            'image'=>$request->image,
            'lang'=>$request->lang??'en', 
            'fireBaseToken'=>$request->fireBaseToken,
            'imageSocial'=>$request->imageSocial,
        ]);




        // set user vertifred 
        $record->is_verified=1; 
        $record->save();
        return [
            "status"=>200,
            'account'=>objects::account( $record)
        ];

    }
}