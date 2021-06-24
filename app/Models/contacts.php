<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class contacts extends GeneralModel
{
    protected $table = 'contacts',$appends=['name','phone','email'];

    public static function createUpdate($params)
    {
        $record= isset($params["id"])? self::find($params["id"]) :new self();
        $record->message = isset($params["message"])? $params["message"]: $record->message;
        $record->status = isset($params["status"])? $params["status"]: $record->status;
        $record->users_id = isset($params["users_id"])? $params["users_id"]: $record->users_id;
        $record->providers_id = isset($params["providers_id"])? $params["providers_id"]: $record->providers_id;
        isset($params["id"])?:$record->created_at = date("Y-m-d H:i:s");
        $record->save();
        return $record;
    }
    public function users()
    {
        return $this->belongsTo(users::class,"users_id");
    }
    function GetNameAttribute(){
        return $this->users?$this->users->name:null;
    }
    function GetPhoneAttribute(){
        return $this->users?$this->users->phone:null;
    }
    function GetEmailAttribute(){
        return $this->users?$this->users->email:null;
    }
}
