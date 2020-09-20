<?php

namespace App;

use Jenssegers\Mongodb\Eloquent\Model;

class UserNotification extends Model
{
    //
    protected $fillable = [
        'user_id', 'notification_id'
    ];
    public function user()
    {
        return $this->belongsTo('App\User', 'user_id');
    }
    public function notification()
    {
        return $this->belongsTo('App\Notification', 'notification_id');
    }
}
