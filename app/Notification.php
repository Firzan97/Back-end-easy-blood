<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Notification extends Model
{
    //
    public function userNotifications()
    {
        return $this->hasMany('App\UserNotification');
    }
}
