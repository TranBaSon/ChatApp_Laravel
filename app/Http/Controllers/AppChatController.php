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

}
