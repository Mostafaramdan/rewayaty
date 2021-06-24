<?php
namespace App\Http\Controllers\Apis\Controllers\deleteFromMypurchases;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Controllers\Apis\Helper\helper;
use App\Http\Controllers\Apis\Controllers\index;
use App\Http\Controllers\Apis\Resources\objects;
use App\Models\purchases;

class deleteFromMypurchasesController extends index
{
    public static function api(){

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
        if($record){
            purchases::createUpdate([
                'id'=>$record->id,
                'deleted_at'=>date("Y-m-d H:i:s")
            ]);
        }
        return [
            "status"=>200
        ];
    }
}
