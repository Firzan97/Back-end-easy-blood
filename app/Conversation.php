<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Conversation extends Model
{
    //
    public function messages()
    {
        return $this->hasMany("App/Message");
    }
    public function userSend()
    {
        return $this->belongsTo('App\User', 'userSendId');
    }
    public function userReceive()
    {
        return $this->belongsTo('App\User', 'userReceiveId');
    }
}
