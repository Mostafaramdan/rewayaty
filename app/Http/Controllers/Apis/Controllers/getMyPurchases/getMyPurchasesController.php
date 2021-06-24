<?php
namespace App\Http\Controllers\Apis\Controllers\getMyPurchases;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Controllers\Apis\Helper\helper;
use App\Http\Controllers\Apis\Controllers\index;
use App\Http\Controllers\Apis\Resources\objects;
use App\Models\purchases;

class getMyPurchasesController extends index
{
    public static function api(){

        $records=  purchases::where('users_id',self::$account->id)->where('deleted_at',null)->get();
        return [
            "status"=>$records->count()?200:204,
            "totalPages"=>$records->count(),
            "purchases"=>objects::ArrayOfObjects($records,"purchases")
        ];
    }
}
