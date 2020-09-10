<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Donation extends Model
{
    //

    protected $fillable = [
        'donate_at', 'donor_id', 'request_id'
    ];
}
