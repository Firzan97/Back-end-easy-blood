<?php

namespace App;

use Jenssegers\Mongodb\Eloquent\Model;

class Event extends Model
{
    //
    protected $collection = 'events';
    // protected $primaryKey = 'id';
    protected $connection = 'mongodb';
}
