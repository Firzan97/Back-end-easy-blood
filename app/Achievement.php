<?php

namespace App;

use Jenssegers\Mongodb\Eloquent\Model;

class Achievement extends Model
{

    //

    public function userAchievement()
    {
        return $this->hasMany("App\UserAchievement");
    }
}
