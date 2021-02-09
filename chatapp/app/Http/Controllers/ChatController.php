<?php

namespace App\Http\Controllers;


use App\Models\ChatRoom;
use App\Models\ChatMessage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ChatController extends Controller
{
    public function rooms(Request $request){
        return ChatRoom::all();
    }

    public function messages(Request $request, $roomId ){
        return ChatMessage::where('chat_room_id',$roomId )
        ->with('user')
        ->orderBy('created_at', 'DESC')
        ->get();
    }

    public function newMessage(Request $request, $roomId ){
        $NewMessage = New ChatMessage;
        $NewMessage->user_id = Auth::id();
        $NewMessage->chat_room_id = $roomId;
        $NewMessage->message = $request->message;
        $NewMessage->save();

        return $NewMessage;
    }
}

