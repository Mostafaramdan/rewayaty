<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class pages extends GeneralModel
{
    protected $table = 'pages';

    public static function createUpdate($params){

        $record= isset($params["id"])? self::find($params["id"]) :new self();
        $record->backgrounds_id  = isset($params["backgrounds_id"])? $params["backgrounds_id"]: $record->backgrounds_id ;
        $record->effects_id   = isset($params["effects_id"])? $params["effects_id"]: $record->effects_id  ;
        $record->musics_id = isset($params["musics_id"])? $params["musics_id"]: $record->musics_id;
        $record->fonts_id = isset($params["fonts_id"])? $params["fonts_id"]: $record->fonts_id;
        $record->text = isset($params["text"])? $params["text"]: $record->text;
        $record->novels_id  = isset($params["novels_id"])? $params["novels_id"]: $record->novels_id ;
        $record->number = isset($params["number"])? $params["number"]: $record->number;
        $record->image = isset($params["image"])?self::$helper::base64_image( $params["image"],'novels'): $record->image;
        $record->save();
        return $record;
    }
    public function background(){
        return $this->belongsTo(backgrounds::class,"backgrounds_id");
    }
    public function effect(){
        return $this->belongsTo(effects::class,"effects_id");
    }
    public function font(){
        return $this->belongsTo(fonts::class,"fonts_id");
    }
    public function music(){
        return $this->belongsTo(musics::class,"musics_id");
    }
}