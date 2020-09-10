<?php

namespace App;

use Jenssegers\Mongodb\Eloquent\Model;

class Job extends Model
{
    protected $collection = 'jobs';
    //
    protected $connection = 'mongodb';

    protected $fillable = [
        'name'
    ];
}
