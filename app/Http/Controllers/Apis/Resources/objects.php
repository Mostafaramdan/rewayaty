<?php
namespace App\Http\Controllers\Apis\Resources;

use App\Http\Controllers\Apis\Helper\helper ;
use  App\Http\Controllers\Apis\Controllers\index;
use App\Http\Controllers\Controller;
use App\Models\phones;
use App\Models\novels;
use App\Models\topics;
use App\Models\emails;
use App\Models\users;
use App\Models\pages;
use App\Models\followers;
use App\Models\purchases;
use App\Models\role_type;
use Carbon\Carbon;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class objects extends index{
    
    public static function city ($record)
    {
        if($record == null  ) {return null;} 
        $object = [];
        $object['id']=$record->id;
        $object['name']=$record->name;
        $object['country']=self::region($record->region);
        return $object;
    }    
    
    public static function effect ($record)
    {
        if($record == null  ) {return null;} 
        $object = [];
        $object['id']=$record->id;
        $object['name']=$record->name;
        $record->price ?$object['price']=$record->price:null;
        $object['isFree']=$record->price==0?true:false;
        $object['isPurchesed'] =purchases::where('effects_id',$record->id)->where('users_id',self::$account->id??null)->count()?true:false;
        $object['link']=Str::contains($record->link,'https://')?$record->link : Request()->root().$record->link;
        return $object;
    }   

    public static function font ($record)
    {
        if($record == null  ) {return null;} 
        $object = [];
        $object['id']=$record->id;
        $object['name']=$record->name;
        $record->price ?$object['price']=$record->price:null;
        $object['isFree']=$record->price==0?true:false;
        $object['isPurchesed'] =purchases::where('fonts_id',$record->id)->where('users_id',self::$account->id??null)->count()?true:false;
        $object['link']=Str::contains($record->link,'https://')?$record->link : Request()->root().$record->link;
        return $object;
    }   

    public static function music ($record)
    {
        if($record == null  ) {return null;} 
        $object = [];
        $object['id']=$record->id;
        $object['name']=$record->name;
        $record->price ?$object['price']=$record->price:null;
        $object['isFree']=$record->price==0?true:false;
        $object['isPurchesed'] =purchases::where('musics_id',$record->id)->where('users_id',self::$account->id??null)->count()?true:false;
        $object['link']=Str::contains($record->link,'https://')?$record->link : Request()->root().$record->link;
        return $object;
    }   
    public static function background ($record)
    {
        if($record == null  ) {return null;} 
        $object = [];
        $object['id']=$record->id;
        $object['name']=$record->name;
        $record->price ?$object['price']=$record->price:null;
        $object['isFree']=$record->price==0?true:false;
        $object['isPurchesed'] =purchases::where('backgrounds_id',$record->id)->where('users_id',self::$account->id??null)->count()?true:false;
        
        $object['image']=Str::contains($record->image,'https://')?$record->image : Request()->root().$record->image;
        return $object;
    }    

    public static function location ($record)
    {
        if($record == null  ) {return null;} 
        $object = [];
        $object['id']=$record->id;
        $object['longitude']=$record->longitude;
        $object['latitude']=$record->latitude;
        $object['address']=$record->address;
        return $object;
    }    

    public static function account ($record)
    {
        if($record == null  ) {return null;} 
        $object = [];
        $object['type'] =$record ->type;
        $object['id'] = $record->id;
        $object['apiToken'] = $record->apiToken;
        $object['name'] = $record->name;
        // $record->image==null?:$object['image'] =Request()->root().$record->image;  
        if($record->image) 
            $object['image']=Str::contains($record->image,'https://')?$record->image : Request()->root().$record->image;

        $record->imageSocial?$object['image'] = $record->imageSocial:null;   
        $object['country'] = self::country($record->region);
        $object['phone'] = $record->phone;
        $object['email'] = $record->email;
        $object['role'] = self::role_type($record->role->role_type?? role_type::where('type','free')->first());
        $object['createdAt'] = Carbon::parse($record->created_at)->timestamp;
        return $object;
    } 

    public static function user ($record)
    {
        if($record == null  ) {return null;} 
        $object = [];
        $object['id'] = $record->id;
        $object['name'] = $record->name;
        if($record->image) 
            $object['image']=Str::contains($record->image,'https://')?$record->image : Request()->root().$record->image;
        $record->imageSocial?$object['image'] = $record->imageSocial:null;   
        $object['phone'] = $record->phone;
        $object['email'] = $record->email;
        $object['role'] = self::role_type($record->role->role_type?? role_type::where('type','free')->first());
        $object['country'] = self::country($record->region);
        $object['followersCount'] = $record->followersCount;
        $object['followingCount'] = $record->followingCount;
        $object['writingsCount'] = $record->writingsCount;
        $object['totalNovels'] = novels::where('users_id',$record->id)->count();
        $object['createdAt'] = Carbon::parse($record->created_at)->timestamp;
        $object['isFollow'] = followers::where('users_id',self::$account->id??null)->where('follow_users_id',$record->id)->count()?true:false;
        return $object;
    } 
  
    public static function ad($record)
    {
        if($record == null  ) {return null;} 
        $object = [];
        $object['id'] = $record->id;
        $object['action'] = $record->url;
        if($record->image) 
            $object['image']=Str::contains($record->image,'https://')?$record->image : Request()->root().$record->image;
        return $object;
    }
    public static function country($record)
    {
        if($record == null  ) {return null;} 
        $object = [];
        $object['id'] = $record->id;
        $object['name'] = $record['name_'.self::$lang];
        return $object;
    }
  
    public static function category ($record)
    {

        if($record == null  ) {return null;}
        $object = [];
        $object['id'] = $record->id;
        $object['name'] = $record['name_'.self::$lang];
        // $object['subCategories'] = self::ArrayOfObjects($record->categories,'subCategory');
        $object['createdAt'] = Carbon::parse($record->created_at)->timestamp;
          return $object;
    }

    public static function subCategory($record)
    {

        if($record == null  ) {return null;}
        $object = [];
        $object['id'] = $record->id;
        $object['name'] = $record->name.'_'.self::$lang;
        $object['category'] = self::category($record->category);
    }
   
    public static function appInfo ($record)
    {
        
        if($record == null) {return null;}
        $object = [];
        $object['phones']  = phones::where('is_active',1)->pluck('phone')->toArray();
        $object['email']   = emails::where('is_active',1)->pluck('email')->toArray();
        $object['aboutUs'] = $record['about_us_'.self::$lang];
        $object['policyTerms'] = $record['policy_terms_'.self::$lang];
        return $object;
    }
    public static function role ($record)
    {
        
        if($record == null) {return null;}
        $object = [];
        $object['id'] = $record->id;
        $object['role_type'] = self::role_type($record->role_type);
        return $object;
    }
    public static function role_type ($record)
    {
        
        if($record == null) {return null;}
        $object = [];
        $object['id'] = $record->id;
        $object['type'] = $record->type;
        $object['totalNovelsInThisMonth'] = novels::where('users_id',self::$account->id??null)->whereMonth('created_at',date('m'))->count();
        // $object['usedEffecs'] =pages::unique()
        $object['name'] = $record['name_'.self::$lang];
        if($record->image) 
            $object['image']=Str::contains($record->image,'https://')?$record->image : Request()->root().$record->image;
        $object['number_of_pages'] = $record->number_of_pages;
        $object['number_of_month'] = $record->number_of_month;
        $object['musics'] = $record->musics;
        $object['effects'] = $record->effects;
        $object['backgrounds'] = $record->backgrounds;
        $object['fonts'] = $record->fonts;
        $object['image_per_page'] = $record->image_per_page?true:false;
        $object['number_of_novels_per_month'] = $record->number_of_novels_per_month;
        $object['price'] = $record->price;

        return $object;
    }

    public static function notification  ($record){
        // this object take record from notify table ;
        if($record == null  ) {return null;}
        $object['id'] = $record->id;
        $object['type'] = $record->type;
        $record->orders? $object['order'] = self::order($record->orders):false;
        $object['content'] = $record->notification->content;
        $object['isSeen'] = $record->is_seen == 1 ? true : false ;
        $object['createdAt'] = Carbon::parse($record->created_at)->timestamp;
        return $object;
    }

    public static function page ($record)
    {
        if($record == null) {return null;}
        $object['id'] = $record->id;
        $object['number'] = $record->number;     
        if($record->image)
            $object['image'] =Str::contains( $record->image, 'http')? $record->image:Request()->root().$record->image;   
        
        $object['text'] = $record->text;
        $record->backgrounds_id? $object['background'] = self::background($record->background):null;
        $record->effects_id? $object['effect'] = self::effect($record->effect):null;
        $record->musics_id? $object['music'] = self::music($record->music):null;
        $record->fonts_id? $object['font'] = self::font($record->font):null;
        return $object;
    }

    public static function novel ($record)
    {
        if($record == null) {return null;}
        $object['id'] = $record->id;
        $object['name'] = $record->name;
        $object['views'] = (int)$record->views;
        $object['isDraft'] = (int)$record->is_draft;
        if($record->image) 
            $object['image']=Str::contains($record->image,'https://')?$record->image : Request()->root().$record->image;

        if($record->cover_image) 
            $object['cover_image']=Str::contains($record->cover_image,'https://')?$record->cover_image : Request()->root().$record->cover_image;

        $object['nuberOfFavorites'] =$record->favorites->count();
        $object['category'] = self::category($record->category);
        $object['description'] = $record->description;
        $object['keywords'] = explode(",",$record->keywords);
        $record->backgrounds_id? $object['background'] = self::background($record->background):null;
        $record->effects_id? $object['effect'] = self::effect($record->effect):null;
        $record->musics_id? $object['music'] = self::music($record->music):null;
        $record->fonts_id? $object['font'] = self::background($record->font):null;
        $object['pages'] =self::ArrayOfObjects($record->pages,'page');
        $object['nuberOfPages'] =$record->pages->count();
        $object['createdAt'] = Carbon::parse($record->created_at)->timestamp;
        $object['user'] =self::user($record->user);
        $object['isPending'] =$record->is_pending? true:false;
        $object['isInLibrary'] =$record->isInLibrary?true:false;
        

        return $object;
    }
    public static function novelOfUser ($record)
    {
        if($record == null) {return null;}
        $object['id'] = $record->id;
        $object['name'] = $record->name;
        $object['description'] = $record->description;
        if($record->cover_image) 
            $object['cover_image']=Str::contains($record->cover_image,'https://')?$record->cover_image : Request()->root().$record->cover_image;
        $object['isDraft'] = (int)$record->is_draft;
        $object['views'] = $record->views;
        $object['nuberOfFavorites'] =$record->favorites->count();
        $object['keywords'] = explode(",",$record->keywords);
        $object['nuberOfPages'] =$record->pages->count();
        $object['isPending'] =$record->is_pending? true:false;

        $object['category'] = self::category($record->category);

        return $object;
    }
    public static function topic ($record)
    {
        if($record == null  ) {return null;} 
        $object = [];
        $object['id'] = $record->id;
        $object['title'] = $record->title;
        $object['description'] = $record->description;
        if($record->image) 
            $object['image']=Str::contains($record->image,'https://')?$record->image : Request()->root().$record->image;
        $object['views'] = $record->views;
        $object['nuberOfFavorites'] =$record->favorites->count();
        $record->user ? $object['user'] = self::user($record->user) : null ;
        $object['isInLibrary'] =$record->isInLibrary?true:false;
        $object['createdAt'] = Carbon::parse($record->created_at)->timestamp;
  
        return $object;
    } 
    public static function topicOfUser ($record)
    {
        if($record == null  ) {return null;} 
        $object = [];
        $object['id'] = $record->id;
        $object['title'] = $record->title;
        if($record->image) 
            $object['image']=Str::contains($record->image,'https://')?$record->image : Request()->root().$record->image;
  
        return $object;
    } 
    public static function library ($record)
    {
        if($record == null  ) {return null;} 
        $object = [];
        $object['id'] = $record->id;
        $object['novel'] = self::novel($record->novel);
        $object['topic'] = self::topic($record->topic);
  
        return $object;
    } 
    public static function comment ($record)
    {
        if($record == null  ) {return null;} 
        $object = [];
        $object['id'] = $record->id;
        $object['comment'] = $record->comment;
        $object['user'] = self::user($record->user);
        $object['createdAt'] = Carbon::parse($record->created_at)->timestamp;
        $record->commentReplay?$object['commentReplay'] = self::comment($record->commentReplay):null;

        return $object;
    } 
    public static function purchases ($record)
    {
        if($record == null  ) {return null;} 
        $object = [];
        $object['id'] = $record->id;
        $record->font ?$object['font'] = self::font($record->font):null;
        $record->effect ? $object['effect'] = self::effect($record->effect):null;
        $record->music ? $object['music'] = self::music($record->music):null;
        $record->background ? $object['background'] = self::background($record->background):null;
  
        return $object;
    } 
    public static function news ($record)
    {
        if($record == null  ) {return null;} 
        $object = [];
        $object['id'] = $record->id;
        $object['title'] = $record->title;
        $object['description'] = $record->description;
        $record->image?$object['image'] =Request()->root().$record->image:null; 
        $object['views'] = $record->views;
        $object['nuberOfFavorites'] =$record->favorites->count();
        $object['createdAt'] = Carbon::parse($record->created_at)->timestamp;
  
        return $object;
    } 

    public static function ArrayOfObjects ($Items, $objectname) { 

        if(count($Items)==0) return $Items;
        
        $Array = [];
        foreach ($Items as $Item) {
             $Array[] = self::$objectname($Item);
        }
        $final_Array=[];
        
        foreach($Array as $A)
           if($A==null)
                continue;
           else
                array_push($final_Array,$A);
        return $final_Array;
    } 
}