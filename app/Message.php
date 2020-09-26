<?php

namespace App;

use Jenssegers\Mongodb\Eloquent\Model;

class Message extends Model
{
    //
    protected $collection = 'messages';
    // protected $primaryKey = 'id';
    protected $connection = 'mongodb';
    public function conversation()
    {
        return $this->belongsTo('App\Conversation', 'conversationId');
    }
    public function user()
    {
        return $this->belongsTo('App\User', 'userId');
    }
}
