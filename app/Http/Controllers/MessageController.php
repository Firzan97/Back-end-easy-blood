<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Console\Command;
use App\Message;
use App\Conversation;

class MessageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    //use to fetch all message
    public function index()
    {
        //
        return Message::with('conversation')->get();
    }

    //use to fetch unread message 
    public function unread($userId, $conversationId)
    {
        //
        $message = Message::where('conversationId', $conversationId)->where('isRead', false)->where("userId", $userId)->get();
        return count($message);
    }
    //use to fetch the latest message between sender and receiver
    public function latestMessage($id)
    {
        return Message::where('conversationId', $id)->orderBy('created_at', 'desc')->first();
    }
    //use to fetch all the message between sender and receiver 
    public function conversationMessage($user1, $user2)
    {
        $conversation1 = Conversation::where('userSendId', $user1)->Where('userReceiveId', $user2)->first();
        $conversation2 = Conversation::where('userSendId', $user2)->Where('userReceiveId', $user1)->first();
        if ($conversation1 == null && $conversation2 == null) { } else {
            if ($conversation1 == null) {
                $message = Message::where('conversationId', $conversation2->id)->get();
            } else {
                $message = Message::where('conversationId', $conversation1->id)->get();
            }
            return $message;
        }
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    // use to make the unread message become read
    public function update(Request $request)
    {
        //
        $check = new Conversation;
        $check2 = new Conversation;
        $check = Conversation::where("userSendId", $request->userSendId)
            ->where("userReceiveId", $request->userReceiveId)
            ->first();
        $check2 = Conversation::where("userSendId", $request->userReceiveId)
            ->where("userReceiveId", $request->userSendId)
            ->first();

        if ($check == null && $check2 == null) { } else {
            if ($check == null) {

                $converId = $check2->_id;
            } else {
                $converId = $check->_id;
            }
            $messages = Message::where("conversationId", "$converId")->get();
            foreach ($messages as $message) {
                if ($message->userId == $request->userId) {
                    $message->isRead = $request->isRead;
                }
                $message->save();
            }
        }



        // $messages = Message::where("conversationId", "$id")->get();
        // foreach ($messages as $message) {
        //     if ($message->userId == $request->userId) {
        //         $message->isRead = $request->isRead;
        //     }
        //     $message->save();
        // }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
