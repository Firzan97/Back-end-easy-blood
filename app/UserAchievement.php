<?php

namespace App;

use Jenssegers\Mongodb\Eloquent\Model;


class UserAchievement extends Model
{
    //
    public function user()
    {
        return $this->belongsTo("App\User");
    }
    public function achievement()
    {
        return $this->belongsTo("App\Achievement");
    }
}
