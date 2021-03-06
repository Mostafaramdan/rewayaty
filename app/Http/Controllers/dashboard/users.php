<?php
namespace App\Http\Controllers\dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Controllers\Apis\Helper\helper;
use App\Models\users as model;
use App\Models\roles;

class users extends Controller
{
public static $model;
function __construct(Request $request)
{
    self::$model=model::class;
}
public static function index(Request $request)
{
    $records= self::$model::all();
    if($request->id){
        $records= $records->where('id',$request->id);
    }
    $totalPages= ceil($records->count()/config('helperDashboard.itemPerPage'));
    $currentPage= 1;
    $records=$records->forpage(1,config('helperDashboard.itemPerPage'));
    return view('dashboard.users.index',compact("records","totalPages",'currentPage'));
}   

public static function indexPageing(Request $request)
{
  $sort=$request->sortType??'sortBy';
  $records= self::$model::all()->$sort($request->sortBy??"id");   
   if($request->search){
        $search= $request->search;
        $records= $records->filter(function($item) use ($search) {
                return stripos($item['name'],$search) !== false;
            });
    }
    $totalPages= ceil($records->count()/config('helperDashboard.itemPerPage'));
    $currentPage= $request->currentPage;
    $records=$records->forpage($request->currentPage,config('helperDashboard.itemPerPage'));
    $paging= (string) view('dashboard.layouts.paging',compact('totalPages','currentPage'));
    $tableInfo= (string) view('dashboard.users.tableInfo',compact('records'));
    return ['paging'=>$paging,'tableInfo'=>$tableInfo];
}

    public static function createUpdate(Request $request)
    {
        $rules=[
            "end_date"     =>"required",
            // "email"    =>"required_if:phone,|regex:/[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,6}/|unique:users,email",
            // "phone"    =>"required_if:email,|numeric|between:100000000000,99999999999999999999|unique:users,phone",
            // 'regionId' =>"required|exists:regions,id|",
            // "password" =>"required|min:6",
        ];

        $messages=[
        ];

        $messagesAr=[

            "end_date.required"     =>"?????? ?????????? ?????????? ????????????????",

            "name.required"     =>"?????? ?????????? ??????????",
            "name.min"          =>"?????? ???? ???? ?????? ?????????? ???? 3 ???????? ",

            "email.required_if" =>"?????? ?????????? ?????? ???????????????? ???? ???????????? ????????????????????",
            "email.regex"       =>"?????? ?????????? ???????????? ???????????????????? ???????? ????????",
            "email.min"         =>"?????? ???? ???? ?????? ???????????? ???????????????????? ???? 5 ???????? ",
            "email.unique"      =>"?????? ???????????? ???????? ??????????",

            "phone.required_if" =>"?????? ?????????? ?????? ???????????????? ???? ???????????? ????????????????????",
            "phone.nemeric"     =>"?????? ?????????? ?????? ???????????????? ???????? ???????? ",
            "phone.between"     =>"?????? ???? ???? ?????? ?????? ???????????????? ???? 11 ?????????? ?????? ???????? ???? 15 ?????? ",
            "phone.unique"      =>"?????? ???????????? ???????? ??????????",
            
            "regionId.required" =>"?????? ?????????? ?????????? ",
            "regionId.exists"   =>"?????? ?????????? ?????? ???????? ???? ?????????? ????????????????",

            "password.required" =>"?????? ?????????? ?????????? ??????????",
            "password.min"      =>"?????? ???? ???? ?????? ?????????? ?????????? ???? 6 ?????????? ???? ????????",

        ];

        $messagesEn=[
            
        ];
        $ValidationFunction=$request->showAllErrors==1?'showAllErrors':'Validator';
        $Validation = helper::{$ValidationFunction}($request->all(), $rules, $messages,'en'?$messagesAr:$messagesEn);
        if ($Validation !== null) {    return $Validation;    }    
        // $record= self::$model::createUpdate([
        //     'name'=>$request->name,
        //     'regions_id'=>$request->regionId,
        //     'email'=>$request->email,
        //     'phone'=>$request->phone,
        //     'password'=>$request->password,
        //     'image'=>$request->image,  
        //     'is_android'=>1, 
        //     'is_online'=>0, 
        // ]);
        roles::createUpdate([
            'start_at'=>date('Y-m-d'),
            'end_at'=>$request->end_date,
            'given_users_id'=>$request->id,
            'role_type_id'=>$request->roles_id,

        ]);    $message=$request->id?"edited successfully":'added successfully';
        
        return response()->json(['status'=>200,'message'=>$message]);
    }

    public static function getRecord($id)
    {
        return  self::$model::find($id);
    }
    public static function searchForResult(Request $request)
    {
        $records=  self::$model::where('is_active',1)
                                ->where('name','like','%'.$request->search.'%')
                                ->orWhere('phone','like','%'.$request->search.'%')
                                ->forPage(1,25)
                                ->get();
        return view('dashboard.novels.search',compact('records'));

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

