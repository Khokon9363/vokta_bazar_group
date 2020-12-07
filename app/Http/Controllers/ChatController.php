<?php

namespace App\Http\Controllers;

use App\Chat;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ChatController extends Controller
{
    public function allUsers()
    {
        return response()->json(User::where('role','!=',1)->get(),200);
    }
    public function allChats($id)
    {
        if(count(Chat::where('sender_id',Auth::user()->id)->where('receiver_id',$id)->get()) != 0 || count(Chat::where('sender_id',$id)->where('receiver_id',Auth::user()->id)->get()) != 0){            
            if(Auth::user()->role == 1){
                return response()->json(Chat::where('sender_id',Auth::user()->id)
                                            ->where('receiver_id',$id)
                                            ->orWhere('sender_id',$id)
                                            ->get(),200);
            }else{
                return response()->json(Chat::where('sender_id',Auth::user()->id)
                                             ->where('receiver_id',$id)
                                             ->orWhere('receiver_id',Auth::user()->id)
                                             ->get(),200);
            }
        }else{
            return response()->json('None',200);
        }

    }
    public function send(Request $request)
    {
        $chat = new Chat();
        $chat->sender_id = Auth::user()->id;
        $chat->receiver_id = $request->receiver_id;
        $chat->chat = $request->chat;
        $chat->save();
        return response()->json($chat,200);
    }
}
