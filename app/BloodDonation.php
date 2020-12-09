<?php

namespace App;

use Jenssegers\Mongodb\Eloquent\Model;

class BloodDonation extends Model
{
    //
    public function user()
    {
        return $this->belongsTo("App\User");
    }
    public function request()
    {
        return $this->belongsTo('App\Request');
    }
}
