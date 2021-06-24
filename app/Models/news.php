<?php

namespace App\Models;

use  App\Http\Controllers\Apis\Controllers\index;
use App\Http\Controllers\Apis\Helper\helper ;
use Illuminate\Database\Eloquent\Model;

class news extends GeneralModel
{
    protected $table = 'news';

    public static function createUpdate($params){

        $record= isset($params["id"])? self::find($params["id"]) :new self();
        $record->image =isset($params['image'])?helper::base64_image( $params['image'],'stores'): $record->image;
        $record->description = isset($params["description"])? $params["description"]: $record->description;
        $record->title = isset($params["title"])? $params["title"]: $record->title;
        isset($params["id"])?:$record->created_at = date("Y-m-d H:i:s");
        $record->save();
        return $record;
    }
    public function favorites(){
        return $this->hasMany(favorites::class,'news_id');
    }
    public function user(){
        return $this->belongsTo(users::class,"users_id");
    }
}