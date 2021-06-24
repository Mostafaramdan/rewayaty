<?php
namespace App\Http\Controllers\Apis\Controllers\getNovels;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Controllers\Apis\Helper\helper;
use App\Http\Controllers\Apis\Controllers\index;
use App\Http\Controllers\Apis\Resources\objects;
use App\Models\novels;

class getNovelsController extends index
{
    public static function api(){

        $records=  novels::allActive()->sortbyDesc('id');

        if(self::$request->novelId){
            return [
                "status"=>200,
                "novel"=>objects::novel(novels::find(self::$request->novelId)),
            ];
        }
        if(self::$request->isDraft){
            $records= $records->where('users_id',self::$account->id)->where('is_draft',1);
        }else{
            $records= $records->where('is_draft',0);
        }
        // return $records;
        if(self::$request->mostFavorites == 1){
            $records= $records->sortbyDesc('numberOfFavorites');
        }
        if(self::$request->mostRead == 1){
            $records= $records->sortbyDesc('views');
        }
        if(self::$request->categoryId){
            $records= $records->where('categories_id',self::$request->categoryId);
        }
        if(self::$request->userId){
            if(!self::$request->isDraft){
                $records= $records->sortByDesc('accepted_at')->where('users_id',self::$request->userId);
                if(self::$account->id != self::$request->userId){
                    $records= $records->where('is_pending',0); // get pending novel in case of sending userId and this  is it's user of api token
                }
            }
        }else{
            $records= $records->where('is_pending',0);
        }
        return [
            "status"=>$records->forPage(self::$request->page+1,self::$itemPerPage)->count()?200:204,
            "totalPages"=>ceil($records->count()/self::$itemPerPage),
            'count'=>$records->count(),
            "novels"=>objects::ArrayOfObjects($records->forPage(self::$request->page+1,self::$itemPerPage),"novel"),
        ];
    }
}