<?php
namespace App\Http\Controllers\dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Controllers\Apis\Helper\helper;
use App\Models\topics as model;

class topics extends Controller
{
    public static $model;
    function __construct(Request $request)
    {
        self::$model=model::class;
    }
    public static function index()
    {
        $records= self::$model::all();
        $totalPages= ceil($records->count()/config('helperDashboard.itemPerPage'));
        $currentPage= 1;
        $records=$records->forpage(1,config('helperDashboard.itemPerPage'));
        return view('dashboard.topics.index',compact("records","totalPages",'currentPage'));
    }   

    public static function indexPageing(Request $request)
    {
        $sort=$request->sortType??'sortBy';
        $records= self::$model::all()->$sort($request->sortBy??"id",);    
        if($request->search){
            $search= $request->search;
            $records= $records->filter(function($item) use ($search) {
                if( stripos($item['title'],$search) !== false || stripos($item['description'],$search) !== false)
                    return true;
                return false;
            });
        }
        
        $totalPages= ceil($records->count()/config('helperDashboard.itemPerPage'));
        $currentPage= $request->currentPage>0?$request->currentPage:1;
        $records=$records->forpage($currentPage,config('helperDashboard.itemPerPage'));
        $paging= (string) view('dashboard.layouts.paging',compact('totalPages','currentPage'));
        $tableInfo= (string) view('dashboard.topics.tableInfo',compact('records'));
        return ['paging'=>$paging,'tableInfo'=>$tableInfo];
    }

    public static function createUpdate(Request $request)
    {
        $rules=[
            "title"     =>"required|min:3",
            "description"     =>"required|min:3",
            "image"     =>"required_if:id,",
            "keywords"     =>"required",
            'categories_id' =>"required|exists:categories,id|",
            'users_id' =>"nullable|exists:users,id|",
        ];

        $messages=[
        ];

        $messagesAr=[

            "title.required"     =>"يجب ادخال العنوان",
            "title.min"          =>"يجب ان لا يقل العنوان عن 3 حروف ",

            "image.required_if"     =>"يجب ادخال الصورة",

            "description.required"     =>"يجب ادخال الوصف",
            "description.min"          =>"يجب ان لا يقل الوصف عن 3 حروف ",

            "keywords.required" =>"يجب ادخال الكلمات المفتاحية ",

            "categories_id.required" =>"يجب ادخال القسم  ",

            "users_id.required" =>"يجب ادخال  المستخدم ",

        ];

        $messagesEn=[
            
        ];
        $ValidationFunction=$request->showAllErrors==1?'showAllErrors':'Validator';
        $Validation = helper::{$ValidationFunction}($request->all(), $rules, $messages,'en'?$messagesAr:$messagesEn);
        if ($Validation !== null) {    return $Validation;    }    
        $record= self::$model::createUpdate([
            'id'=>$request->id,
            'title'=>$request->title,
            'description'=>$request->description,
            'image'=>$request->image,
            'keywords'=>$request->keywords,
            'categories_id'=>$request->categories_id,
            'users_id'=>$request->users_id,
        ]);

        $message=$request->id?"edited successfully":'added successfully';
        
        return response()->json(['status'=>200,'message'=>$message,'record'=>$record]);
    }
    public static function getRecord($id)
    {
        return  self::$model::find($id);
    }
    public static function check($type, $id)
    {
        $record= self::$model::find($id);
        if($record->$type){
            $action="false";
            $record->$type=0;
        }else{
            $action="true";
            $record->$type=1;
        }
        $record->save();
        return response()->json(['status',200,'action'=>$action]);
    }
    public static function delete($id)
    {
        $record= self::$model::find($id);
        $record->delete();
        return response()->json(['status'=>200]);
    }
}

