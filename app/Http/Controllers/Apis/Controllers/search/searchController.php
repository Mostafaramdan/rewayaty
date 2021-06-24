<?php
namespace App\Http\Controllers\Apis\Controllers\search;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Controllers\Apis\Helper\helper;
use App\Http\Controllers\Apis\Controllers\index;
use App\Http\Controllers\Apis\Resources\objects;
use App\Models\novels;
use App\Models\topics;
use App\Models\users;

class searchController extends index
{
    public static function api(){

        $search= self::$request->search;
        if(self::$request->type== 'novels'){
            $objectName='novelOfUser';
            $records=  novels::allActive();

            # first
             // get novel by name or description 
            $recordsIds1= $records->filter(function($item) use ($search) {
                if( stripos($item['name'],$search) !== false ||  stripos($item['description'],$search) !== false)
                    return true;
                return false ; 
            })->pluck('id')->toArray();

            #second 
            //  get novel by keywords 
            $recordsIds2= [];
            foreach ($records as $record){
                $keywords=   $record->keywords? explode(  ',' , $record->keywords) :[];
                foreach( $keywords as $keyword) {
                    if( stripos($keyword,$search) !== false)
                        $recordsIds2[] = $record->id;
                } 
            }
            // return [$recordsI ds1, $recordsIds2];
            $records= novels::find(array_merge($recordsIds1, $recordsIds2));
        
        }else if(self::$request->type== 'topics'){
            $objectName='topic';
            $records=  topics::allActive()->filter(function($item) use ($search) {
                if( stripos($item['title'],$search) !== false ||  stripos($item['description'],$search) !== false)
                    return true;
                return false ; 
            });
        }else if(self::$request->type== 'users'){
            $objectName='user';
            $records=  users::allActive()->filter(function($item) use ($search) {
                if( stripos($item['name'],$search) !== false )
                    return true;
                return false ; 
            });
        }
        return [
            "status"=>$records->forPage(self::$request->page+1,self::$itemPerPage)->count()?200:204,
            "totalPages"=>ceil($records->count()/self::$itemPerPage),
            self::$request->type=>objects::ArrayOfObjects($records->forPage(self::$request->page+1,self::$itemPerPage), $objectName),
        ];
    }
}
