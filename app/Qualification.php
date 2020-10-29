<?php

namespace App;

use Jenssegers\Mongodb\Eloquent\Model;

class Qualification extends Model
{
    //
    protected $collection = 'qualifications';

    protected $connection = 'mongodb';
    public function user()
    {
        return $this->belongsTo('App\User', 'user_id');
    }
}
