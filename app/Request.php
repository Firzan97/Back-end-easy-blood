<?php

namespace App;

use Jenssegers\Mongodb\Eloquent\Model;

class Request extends Model
{
    protected $collection = 'requests';
    // protected $primaryKey = 'id';
    protected $connection = 'mongodb';
    protected $fillable = [
        'location', 'bloodType', 'reason', 'user_id', 'donor_id'
    ];

    public function user()
    {
        return $this->belongsTo('App\User', 'user_id');
    }
    public function donor()
    {
        return $this->belongsTo('App\User', 'donor_id');
    }
    public function bloodDonation()
    {
        return $this->hasOne('App\BloodDonation');
    }
    public function confirmation()
    {
        return $this->hasOne('App\Confirmation');
    }
}
