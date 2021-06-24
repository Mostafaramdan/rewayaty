<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Http\Controllers\Apis\Helper\helper ;
use Illuminate\Support\Str;

class topics extends GeneralModel
{
    protected $table = 'topics',$appends=['isInLibrary','category_name'];
    public $timestamps=false;
    public static function createUpdate($params){

        $record= isset($params["id"])? self::find($params["id"]) :new self();
        $record->image =isset($params['image'])?helper::base64_image( $params['image'],'topics'): $record->image;
        $record->title  = isset($params["title"]) ? $params["title"]: $record->title;
        $record->description  = isset($params["description"]) ? $params["description"]: $record->description;
        $record->users_id  = isset($params["users_id"]) ? $params["users_id"]: $record->users_id;
        $record->keywords = isset($params["keywords"])? $params["keywords"]: $record->keywords;
        $record->categories_id = isset($params["categories_id"])? $params["categories_id"]: $record->categories_id;
        isset($params['id'])?:$record->created_at = date("Y-m-d H:i:s");
        $record->save();
        return $record;
    }
    public function favorites(){
        return $this->hasMany(favorites::class,'topics_id');
    }
    function GetIsInLibraryAttribute()
    {   
        return libraries::where('users_id',self::$account->id??null)
                 ->where('topics_id',$this->id)
                 ->count();
    }
    public function category(){
        return $this->belongsTo(categories::class,'categories_id');
    }
    public function user(){
        return $this->belongsTo(users::class,'users_id');
    }
    function GetCategoryNameAttribute()
    {   
        return $this->category->name_ar;
    }    
}