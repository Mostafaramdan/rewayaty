<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class purchases extends GeneralModel
{
    protected $table = 'purchases';

    public static function createUpdate($params){

        $record= isset($params["id"])? self::find($params["id"]) :new self();
        $record->musics_id = isset($params["musics_id"])? $params["musics_id"]: $record->musics_id;
        $record->effects_id = isset($params["effects_id"])? $params["effects_id"]: $record->effects_id;
        $record->backgrounds_id = isset($params["backgrounds_id"])? $params["backgrounds_id"]: $record->backgrounds_id;
        $record->fonts_id = isset($params["fonts_id"])? $params["fonts_id"]: $record->fonts_id;
        $record->users_id = isset($params["users_id"])? $params["users_id"]: $record->users_id;
        $record->deleted_at = isset($params["deleted_at"])? $params["deleted_at"]: $record->deleted_at;
        isset($params["id"])?:$record->created_at = date("Y-m-d H:i:s");
        $record->save();
        return $record;
    }
    public function font(){
        return $this->belongsTo(fonts::class,"fonts_id");
    }
    public function effect(){
        return $this->belongsTo(effects::class,"effects_id");
    }
    public function music(){
        return $this->belongsTo(musics::class,"musics_id");
    }
    public function background(){
        return $this->belongsTo(backgrounds::class,"backgrounds_id");
    }
   
}