<?php

namespace App;

use Jenssegers\Mongodb\Eloquent\Model;

class Qualification extends Model
{
    //
    protected $collection = 'qualifications';

    protected $connection = "mongodb";
}
