<?php
namespace App\Http\Controllers\dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Controllers\Apis\Helper\helper;
use App\Models\backgrounds as model;

class backgrounds extends Controller
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
        return view('dashboard.backgrounds.index',compact("records","totalPages",'currentPage'));
    }   

    public static function indexPageing(Request $request)
    {
      $sort=$request->sortType??'sortBy';
      $records= self::$model::all()->$sort($request->sortBy??"id",);    if($request->search){
            $search= $request->search;
            $records= $records->filter(function($item) use ($search) {
                    return stripos($item['name'],$search) !== false;
                });
        }
        $totalPages= ceil($records->count()/config('helperDashboard.itemPerPage'));
        $currentPage= $request->currentPage>0?$request->currentPage:1;
        $records=$records->forpage($currentPage,config('helperDashboard.itemPerPage'));
        $paging= (string) view('dashboard.layouts.paging',compact('totalPages','currentPage'));
        $tableInfo= (string) view('dashboard.backgrounds.tableInfo',compact('records'));
        return ['paging'=>$paging,'tableInfo'=>$tableInfo];
    }

    public static function createUpdate(Request $request)
    {
        $rules=[
            "name"     =>"required|min:3",
            "price"     =>"required",
            "image"     =>"required_if:id,",
        ];

        $messages=[
        ];

        $messagesAr=[

            "name.required"     =>"يجب ادخال الاسم",
            "name.min"          =>"يجب ان لا يقل الاسم عن 3 حروف ",

            "price.required"    =>"يجب ادخال السعر",

            "image.required_if"     =>"يجب ادخال الخلفية ",

        ];

        $messagesEn=[
            
        ];
        $ValidationFunction=$request->showAllErrors==1?'showAllErrors':'Validator';
        $Validation = helper::{$ValidationFunction}($request->all(), $rules, $messages,'en'?$messagesAr:$messagesEn);
        if ($Validation !== null) {    return $Validation;    }    
        $record= self::$model::createUpdate([
            'id'=>$request->id,
            'name'=>$request->name,
            'price'=>$request->price,
            'image'=>$request->image,
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

