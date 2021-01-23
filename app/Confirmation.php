<?php

namespace App;

use Jenssegers\Mongodb\Eloquent\Model;

class Confirmation extends Model
{
    //
    protected $collection = 'confirmations';
    protected $connection = 'mongodb';
    protected $fillable = [
        'user_id', 'request_id'
    ];
    public function request()
    {
        return $this->belongsTo('App\Request');
    }
    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
