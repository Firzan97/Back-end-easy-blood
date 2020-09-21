<?php

namespace App;

use Jenssegers\Mongodb\Eloquent\Model;

class Notification extends Model
{
    //
    public function userNotifications()
    {
        return $this->hasMany('App\UserNotification');
    }
}
