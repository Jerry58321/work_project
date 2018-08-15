<?php 
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use DB;

class MenuController 
{
    function index(Request $request)
    {
        //新增資料
        if($request->has("insert"))
        {
            $validator = \Validator::make($request->all(), [
                'name'    => 'required | max:100',
                'email'   => 'required | max:100',
            ], [
                'required'          => ':attribute 未填寫',
                'max'               => ':attribute 長度為100個英文或數字以內',
            ], [
                'name'    => '姓名',
                'email'   => 'Email',
            ]);
            if ($validator->fails()) {
                return redirect()->back()->withErrors($validator);
            }
            DB::table("users")
              ->insert([
                  "name"    =>$request->input("name"),
                  "email"   =>$request->input("email")
              ]);
        }

        //編輯資料
        if($request->has("edit"))
        {
            $validator = \Validator::make($request->all(), [
                'edit_name'    => 'required | max:100',
                'edit_email'   => 'required | max:100',
            ], [
                'required'          => ':attribute 未填寫',
                'max'               => ':attribute 長度為100個英文或數字以內',
            ], [
                'edit_name'    => '姓名',
                'edit_email'   => 'Email',
            ]);
            if ($validator->fails()) {
                return redirect()->back()->withErrors($validator);
            }
            //取得編號
            $id = key($request->input("edit"));
            DB::table("users")
              ->where("id",$id)
              ->update([
                  "name"    =>$request->input("edit_name"),
                  "email"   =>$request->input("edit_email")
              ]);
        }

        //刪除資料
        if($request->input("delete"))
        {
            $id = key($request->input("delete"));
            DB::table("users")
              ->where("id",$id)
              ->delete();
        }
        //select資料
        $show = DB::table("users")
                  ->select([
                      "id",
                      "name",
                      "email"
                  ])
                  ->get();
        return view("menu",
            compact("show"));
    }
}   
?>
