<?php

namespace App;

use Jenssegers\Mongodb\Eloquent\Model;

class Conversation extends Model
{
    //
    protected $collection = 'conversations';
    // protected $primaryKey = 'id';
    protected $connection = 'mongodb';
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
