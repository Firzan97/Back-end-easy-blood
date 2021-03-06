<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Jenssegers\Mongodb\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Jenssegers\Mongodb\Eloquent\Model as Eloquent;
use Illuminate\Support\Facades\Hash;
use JWTAuth;
use App\Event;
use App\UserNotification;
use Tymon\JWTAuth\Contracts\JWTSubject;


class User extends Authenticatable implements JWTSubject
{

    use Notifiable;

    protected $connection = "mongodb";
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'username', 'age', 'bloodType', 'notificationToken', 'gender', 'height', 'imageURL', 'latitude',
        'longitude', 'phoneNumber', 'weight', 'role'
    ];
    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function setPasswordAttribute($password)
    {
        $this->attributes['password'] = Hash::make($password);
    }

    public function getJWTIdentifier()
    {
        return $this->getKey();
    }
    public function getJWTCustomClaims()
    {
        return [];
    }
    public static function checkToken($token)
    {
        if ($token->token) {
            return true;
        }
        return false;
    }
    public static function getCurrentUser($request)
    {
        if (!User::checkToken($request)) {
            return response()->json([
                'message' => 'Token is required'
            ], 422);
        }

        $user = JWTAuth::parseToken()->authenticate();
        return $user;
    }
    public function events()
    {
        return $this->hasMany('App\Event');
    }
    public function requests()
    {
        return $this->hasMany('App\Request');
    }
    public function userNotifications()
    {
        return $this->hasMany('App\UserNotification');
    }
    public function messages()
    {
        return $this->hasMany('App\Message');
    }
    public function conversations()
    {
        return $this->hasMany('App\Conversation');
    }
    public function qualification()
    {
        return $this->hasOne('App\Qualification');
    }

    public function bloodDonations()
    {
        return $this->hasMany("App\BloodDonation");
    }
    public function userAchievement()
    {
        return $this->hasMany("App\UserAchievement");
    }public function confirmation()
    {
        return $this->hasMany('App\Confirmation');
    }
}
