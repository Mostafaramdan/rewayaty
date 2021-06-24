<?php

namespace App\Models;
use App\Models\friends;
use App\Models\followers;
use App\Models\roles;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use App\Http\Controllers\Apis\Controllers\index;
use Carbon\Carbon;
use App\Http\Controllers\Apis\Helper\helper ;

class users extends GeneralModel
{
    protected $table = 'users',$appends=["session",'role','followersCount',
                                            'followingCount','librariesCount',
                                            'writingsCount' ,"mostFamous"
                                        ];

    public static function createUpdate($params){
        $record= isset($params['id'])? self::find($params['id']) :new self();
        $record->name =isset($params['name'])?$params['name']: $record->name;
        $record->email =isset($params['email'])?$params['email']: $record->email;
        $record->phone =isset($params['phone'])?$params['phone']: $record->phone;
        $record->lang =isset($params['lang'])?$params['lang']: $record->lang;
        $record->fireBaseToken =isset($params['fireBaseToken'])?$params['fireBaseToken']: $record->fireBaseToken;
        $record->regions_id =isset($params['regions_id'])?$params['regions_id']: $record->regions_id;
        $record->fireBaseToken =isset($params['fireBaseToken'])?$params['fireBaseToken']: $record->fireBaseToken;
        $record->imageSocial =isset($params['imageSocial'])?$params['imageSocial']: $record->imageSocial;
        $record->password = isset($params['password'])?helper::HashPassword( $params['password']): $record->password;
        $record->image =isset($params['image'])?helper::base64_image( $params['image'],'users'): $record->image;
        $record->apiToken = isset($params['id'])?$record->apiToken: helper::UniqueRandomXChar(69,'api_token');
        isset($params['id'])?:$record->created_at = date("Y-m-d H:i:s");
        $record->save();
        return $record;
    }

    public function region(){
        return $this->belongsTo(regions::class,'regions_id');
    }

    public function target_users(){
        return $this->belongsTo('\App\Models\target_users','target_users_id');
    }

    public function sessions(){
        return $this->hasMany('\App\Models\sessions','users_id');
    }
    function GetSessionAttribute(){
        return count($this->sessions)>0 ? $this->sessions->first():null;
    }
    function GetRoleAttribute(){
        return  roles::orderBy('id','DESC')
                      ->where('start_at','<=',date("Y-m-d"))
                      ->where("end_at",">",date("Y-m-d"))
                      ->where('given_users_id',$this->id)
                      ->first();
     }   
    function GetFollowersCountAttribute(){
        return  followers::where('follow_users_id',$this->id)
                      ->count();
    }
    function GetFollowingCountAttribute(){
        return  followers::where('users_id',$this->id)
                         ->count();
    }
    function GetLibrariesCountAttribute(){
        return  libraries::where('users_id',$this->id)
                        ->count();
    }
    function GetWritingsCountAttribute(){
        return  novels::where('users_id',$this->id)
                        ->count()
                    +
                topics::where('users_id',$this->id)
                ->count();
    }
    function GetMostFamousAttribute(){
        return  novels::where('users_id',$this->id)
                        ->sum('views');
    }
    
}