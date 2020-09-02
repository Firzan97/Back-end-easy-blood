<?php

namespace App;

use Jenssegers\Mongodb\Eloquent\Model;

class Request extends Model
{
    protected $collection = 'request';
    protected $primaryKey = 'id';
    protected $connection = 'mongodb';
    protected $fillable = [
        'location', 'bloodGroup', 'reason', 'user_id'
    ];
}
