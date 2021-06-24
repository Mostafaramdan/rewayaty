<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class phones extends GeneralModel
{
    protected $table = 'phones';
    public $timestamps=false;
    public static function createUpdate($params){
        $record= isset($params['id'])? self::find($params['id']) :new self();
        $record->stores_id =isset($params['stores_id'])?$params['stores_id']: $record->stores_id;
        $record->phone =isset($params['phone'])?$params['phone']: $record->phone;
        $record->app_settings_id =isset($params['app_settings_id'])?$params['app_settings_id']: $record->app_settings_id;
        $record->save();
        return $record;
    }
}
