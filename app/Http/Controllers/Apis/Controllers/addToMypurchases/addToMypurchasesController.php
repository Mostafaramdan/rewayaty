<?php
namespace App\Http\Controllers\Apis\Controllers\addToMypurchases;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Controllers\Apis\Helper\helper;
use App\Http\Controllers\Apis\Controllers\index;
use App\Http\Controllers\Apis\Resources\objects;
use App\Models\purchases;

class addToMypurchasesController extends index
{
    public static function api()
    {
        if(self::$request->fontId){
            $key = 'fonts_id'; 
            $value = self::$request->fontId; 
        }else if(self::$request->musicId){
            $key = 'musics_id'; 
            $value = self::$request->musicId; 
        }elseif(self::$request->effectId){
            $key = 'effects_id'; 
            $value = self::$request->effectId; 
        }elseif(self::$request->backgroundId){
            $key = 'backgrounds_id'; 
            $value = self::$request->backgroundId; 
        }else{
            return [
                'status'=>400
            ];
        }
        $record=  purchases::where('users_id',self::$account->id)
                            ->where($key,$value)
                            ->first();

        if($record && $record->deleted_at== null){
            return [
                "status"=>201,
                "message"=>'you have already this'
            ];
        }elseif( $record && $record->deleted_at){
            $record->delete();
        }
        $records=  purchases::createUpdate([
            'users_id'=>self::$account->id,
            'fonts_id'=>self::$request->fontId,
            'musics_id'=>self::$request->musicId,
            'effects_id'=>self::$request->effectId,
            'backgrounds_id'=>self::$request->backgroundId,
            
        ]);
        return [
            "status"=>200,
        ];
    }
}
