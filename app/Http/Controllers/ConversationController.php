<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Message;
use App\Conversation;

class ConversationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $conversation = Conversation::all();
        return $conversation;
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
        $check = new Conversation;
        $check2 = new Conversation;
        $check = Conversation::where("userSendId", $request->userSendId)
            ->where("userReceiveId", $request->userReceiveId)
            ->first();
        $check2 = Conversation::where("userSendId", $request->userReceiveId)
            ->where("userReceiveId", $request->userSendId)
            ->first();
        if ($check == null && $check2 == null) {
            $conversation = new Conversation;
            $conversation->userSendId = $request->userSendId;
            $conversation->userReceiveId = $request->userReceiveId;
            $conversation->save();
            $message = new Message;
            $message->message = $request->message;
            $message->userId = $request->userSendId;
            $message->conversationID = $conversation->id;
            $message->save();
        } else {
            $message = new Message;
            $message->message = $request->message;
            $message->userId = $request->userSendId;
            $message->conversationID = $check->id;
            $message->save();
        }
        // $conversation = new Conversation;
        // $conversation->userSendId = $request->userSendId;
        // $conversation->userReceiveId = $request->userReceiveId;
        // $conversation->save();

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
