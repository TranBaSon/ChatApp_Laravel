<?php

namespace App\Http\Controllers;

use App\messages;
use App\room;
use App\users;
use App\user_room;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AppChatController extends Controller
{
    public function listUsers(){
        $users = users::all();
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
            "email"   => "required|email|unique:users",
            "password"=> "required|min:6|string",
            //"avatar"=>"required"
        ];
        $this->validate($request,$rules,$messages);

        $avatarName = "avatarDefault.png";

        if ($request->hasFile("avatar")){
            $file = $request->avatar;
            $avatarName = $file->getClientOriginalName();
            $file->move("avatars",$avatarName);
        }
        try{
            users::create([
                "name"=> $request->get("name"),
                "email"=> $request->get("email"),
                "password"=> $request->get("password"),
                "avatar"=> $avatarName,
            ])->save();
        }catch (\Exception $e){
            die($e->getMessage());
        }
        return redirect("/admin/users-table");

    }




    public function userEdit($id_user){
        $user = users::find($id_user);
        return view('userView/edit', compact("user"));
    }

    public function userEdit_post(Request $request){
        $user = users::find($request->get('id_user'));

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
            "email"   => "required|email|unique:users",
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
        return redirect("/admin/users-table");
    }

    public function removeUser($id_user){
        $user = users::find($id_user);
        $user_room = user_room::find($id_user);
        $messages = messages::find($id_user);
        try {
//            $users->is_active = 0;
//            $users->save();
            $user->delete();
            $user_room->delete();
            $messages->delete();
        }catch (\Exception $e){
            return redirect("/admin/users-table")->withErrors(["fail"=>$e->getMessage()]);
        }
        return redirect("/admin/users-table")->with("success","Delete successfully");
    }




    public function addRoom(){
        return view('roomView/addRoom');
    }




    public function addRoom_post(Request $request){
        $messages = [
            "required" => "Bắt buộc phải nhập thông tin",
            "string"    => "Phải nhập vào 1 chuỗi",
            "min"   => "Giá trị tối thiểu 3 ký tự",
            "max"   => "Tối đa 255 ký tự",
            "unique" => "Đã tồn tại giá trị này"
        ];
        $rules = [
            "name" => "required|string|min:3|max:255|unique:room",
        ];
        $this->validate($request,$rules,$messages);
        try{
            room::create([
                "name"=> $request->get("name"),
            ])->save();
        }catch (\Exception $e){
            die($e->getMessage());
        }
        return redirect("/admin/room-table");
    }


    public function editRoom($id_room){
        $room = room::find($id_room);
        return view('roomView/editRoom', compact('room'));
    }

    public function editRoom_post(Request $request){
        $room = room::find($request->get('id_room'));

        $messages = [
            "required" => "Bắt buộc phải nhập thông tin",
            "string"    => "Phải nhập vào 1 chuỗi",
            "min"   => "Giá trị tối 6 ký tự",
            "max"   => "Tối đa 255 ký tự",
            "unique" => "Đã tồn tại giá trị này"
        ];
        $rules = [
            "name" => "required|string|min:3|max:255|unique:room",
        ];
        $this->validate($request,$rules,$messages);
        try{
            $room->update([
                "name"=> $request->get("name"),
            ]);
        }catch (\Exception $e){
            die($e->getMessage());
        }
        return redirect("/admin/room-table");
    }


    public function removeRoom($id_room){
        $room = room::find($id_room);
        $user_room = user_room::find($id_room);
        $messages = messages::find($id_room);
        try {

            $user_room->delete();
            $messages->delete();
            $room->delete();
        }catch (\Exception $e){
            return redirect("/admin/users-table")->withErrors(["fail"=>$e->getMessage()]);
        }
        return redirect("/admin/users-table")->with("success","Delete successfully");
    }



    public function login(){
        return view('userView/login');
    }

    public function loginPost(Request $request){
        $messages = [
            "required" => "Bắt buộc phải nhập thông tin",
            "string"    => "Phải nhập vào 1 chuỗi",
            "numeric"   => "Phải nhập vào 1 số",
            "min"   => "Giá trị tối 6 ký tự",
            "max"   => "Tối đa 255 ký tự",
            "unique" => "Đã tồn tại giá trị này"
        ];
        $rules = [
            "email"   => "required|email",
            "password"=> "required",
        ];
        $this->validate($request,$rules,$messages);

        $email = $request['email'];
        $password = $request['password'];
        if (Auth::attempt(['email'=>$email, 'password'=>$password])){
            return redirect("/chat");
        }else{
            return view('userView/login');
        }

    }

    //sendMess route
    public function sendMess(Request $request){
        $messages = [
            "required" => "Bắt buộc phải nhập thông tin",
        ];

        $rules = [
            "content" => "required",
        ];
        try{
            messages::create([
                "content"=> $request->get("content"),
                "id_room"=> $request->get("id_room"),
                "id_user"=> $request->get("id_user"),
            ])->save();
        }catch (\Exception $e){
            die($e->getMessage());
        }
    }

    public function createRoom(){
        room::create([
            "name"=> 'World Room',
        ])->save();
    }

    public function create_room(Request $request){
        $rules = [
            "name" => "required",
        ];

        try{
            if ($request->get("password")){
                room::create([
                    "name"=> $request->get("name"),
                    "password"=> $request->get("password"),
                ])->save();
            }else{
                room::create([
                    "name"=> $request->get("name"),
                ])->save();
            }
        }catch (\Exception $e){
            die($e->getMessage());
        }
    }


    //home chat

    public function homeChat(){
        return view('chat.talk');
    }

    public function data(){
        $user = users::all();
        $room = room::all();
        $message = messages::all();
        $user_room = user_room::all();
        $data = [$user,$room,$message,$user_room];
        return $data;
    }

}
