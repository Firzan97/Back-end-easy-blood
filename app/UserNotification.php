<?php

namespace App;

use Jenssegers\Mongodb\Eloquent\Model;

class UserNotification extends Model
{
    //
    protected $fillable = [
        'user_id', 'notification_id'
    ];
}
