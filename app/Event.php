<?php

namespace App;

use Jenssegers\Mongodb\Eloquent\Model;

class Event extends Model
{
    //
    protected $collection = 'events';
    // protected $primaryKey = 'id';
    protected $connection = 'mongodb';
    protected $fillable = [
        'name', 'location', 'phoneNum', 'dateStart', 'dateEnd', 'organizer', 'timeStart', 'timeEnd', 'imageURL', 'user_id'
    ];
    public function user()
    {
        return $this->belongsTo('App\User', 'user_id');
    }
}
