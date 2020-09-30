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
    public function index()
    {
        //
        return Message::with('conversation')->get();
    }
    public function unread($userId, $conversationId)
    {
        //
        $message = Message::where('conversationId', $conversationId)->where('isRead', false)->where("userId", $userId)->get();
        return count($message);
    }
    public function latestMessage($id)
    {
        return Message::where('conversationId', $id)->orderBy('created_at', 'desc')->first();
    }
    public function conversationMessage($user1, $user2)
    {
        $conversation1 = Conversation::where('userSendId', $user1)->Where('userReceiveId', $user2)->first();
        $conversation2 = Conversation::where('userSendId', $user2)->Where('userReceiveId', $user1)->first();
        if ($conversation1 == null) {
            $message = Message::where('conversationId', $conversation2->id)->get();
        } else {
            $message = Message::where('conversationId', $conversation1->id)->get();
        }
        return $message;
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
    public function update(Request $request, $id)
    {
        //
        $messages = Message::where("conversationId", "$id")->get();
        foreach ($messages as $message) {
            if ($message->userId == $request->userId) {
                $message->isRead = $request->isRead;
            }
            $message->save();
        }
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
