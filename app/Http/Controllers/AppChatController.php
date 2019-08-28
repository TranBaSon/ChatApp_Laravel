<?php

namespace App\Http\Controllers;

use App\messages;
use App\room;
use App\user;
use App\user_room;
use Illuminate\Http\Request;

class AppChatController extends Controller
{
    public function listUsers(){
        $users = user::all();
        return view('admin/tables/userTable', compact('users'));
    }

    public function listRoom(){
        $rooms = room::all();
        return view('admin/tables/roomTable', compact('rooms'));
    }

    public function listUserRoom(){
        $userRooms = user_room::all();
        return view('admin/tables/user_roomTable', compact('userRooms'));
    }

    public function listMessages(){
        $messages = messages::all();
        return view('admin/tables/messagesTable', compact('messages'));
    }

    public function userRegister(){
        return view('userView/register');
    }

    public function userRegister_post(Request $request){
        $messages = [
            "required" => "Bắt buộc phải nhập thông tin",
            "string"    => "Phải nhập vào 1 chuỗi",
            "numeric"   => "Phải nhập vào 1 số",
            "min"   => "Giá trị tối 6 ký tự",
            "max"   => "Tối đa 255 ký tự",
            "unique" => "Đã tồn tại giá trị này"
        ];
        $rules = [
            "name" => "required|string|max:255",
            "email"   => "required|email|unique:user",
            "password"=> "required|min:6|string",
        ];
        $this->validate($request,$rules,$messages);
        try{
            user::create([
                "name"=> $request->get("name"),
                "email"=> $request->get("email"),
                "password"=> $request->get("password"),
                "avatar"=> $request->get("avatar"),
            ])->save();
        }catch (\Exception $e){
            die($e->getMessage());
        }
        return redirect("/admin/user-table");

    }



    public function userEdit(Request $request){
        $userid = $request->get('id_user');
        $user = user::find($userid);
        return view('userView/edit', compact("user"));
    }

    public function userEdit_post(Request $request){
        $user = user::find($request->get('id_user'));

        $messages = [
            "required" => "Bắt buộc phải nhập thông tin",
            "string"    => "Phải nhập vào 1 chuỗi",
            "numeric"   => "Phải nhập vào 1 số",
            "min"   => "Giá trị tối 6 ký tự",
            "max"   => "Tối đa 255 ký tự",
            "unique" => "Đã tồn tại giá trị này"
        ];
        $rules = [
            "name" => "required|string|max:255",
            "email"   => "required|email|unique:user",
            "password"=> "required|min:6|string",
        ];
        $this->validate($request,$rules,$messages);
        try{
            $user->update([
                "name"=> $request->get("name"),
                "email"=> $request->get("email"),
                "password"=> $request->get("password"),
                "avatar"=> $request->get("avatar"),
            ]);
        }catch (\Exception $e){
            die($e->getMessage());
        }
        return redirect("/admin/user-table");
    }

    public function userRemove($id_user){
        $user = user::find($id_user);
        try {

            $user->update("is_active",0);
            $user->delete();
        }catch (\Exception $e){
            return redirect("/admin/user-table")->withErrors(["fail"=>$e->getMessage()]);
        }
        return redirect("/admin/user-table")->with("success","Delete successfully");
    }

}
