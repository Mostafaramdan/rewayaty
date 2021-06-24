<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class novels extends GeneralModel
{
    protected $table = 'novels',$appends=['numberOfFavorites','isInLibrary','category_name','user_name'];

    public static function createUpdate($params){

        $record= isset($params["id"])? self::find($params["id"]) :new self();
        $record->name = isset($params["name"])? $params["name"]: $record->name;
        $record->users_id = isset($params["users_id"])? $params["users_id"]: $record->users_id;
        $record->description = isset($params["description"])? $params["description"]: $record->description;
        $record->keywords = isset($params["keywords"])? $params["keywords"]: $record->keywords;
        $record->categories_id = isset($params["categories_id"])? $params["categories_id"]: $record->categories_id;
        $record->name = isset($params["name"])? $params["name"]: $record->name;
        $record->image = isset($params["image"])?self::$helper::base64_image( $params["image"],'novels'): $record->image;
        $record->cover_image = isset($params["cover_image"])?self::$helper::base64_image( $params["cover_image"],'novels'): $record->cover_image;
        $record->backgrounds_id  = isset($params["backgrounds_id"])? $params["backgrounds_id"]: $record->backgrounds_id ;
        $record->effects_id   = isset($params["effects_id"])? $params["effects_id"]: $record->effects_id  ;
        $record->musics_id = isset($params["musics_id"])? $params["musics_id"]: $record->musics_id;
        $record->fonts_id = isset($params["fonts_id"])? $params["fonts_id"]: $record->fonts_id;
        $record->is_draft = isset($params["is_draft"])? $params["is_draft"]: $record->is_draft;
        isset($params["id"])?:$record->created_at = date("Y-m-d H:i:s");
        $record->save();
        return $record;
    }
    public function user(){
        return $this->belongsTo(users::class,"users_id");
    }
    public function category(){
        return $this->belongsTo(categories::class,"categories_id");
    }
    public function pages(){
        return $this->hasMany(pages::class,'novels_id');
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
    public function favorites(){
        return $this->hasMany(favorites::class,'novels_id');
    }
    function GetNumberOfFavoritesAttribute(){
        return $this->favorites->count();
    }
    function GetIsInLibraryAttribute()
    {   
        return libraries::where('users_id',self::$account->id??null)
                 ->where('novels_id',$this->id)
                 ->count();
    }
   
    function GetCategoryNameAttribute()
    {   
        return $this->category->name_ar;
    }
    function GetUserNameAttribute()
    {
        return $this->user->name??'';
    }


}