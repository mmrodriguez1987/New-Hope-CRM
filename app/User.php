<?php

namespace newhopecrm;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password','phone', 'role_id'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function rol()
    {
        return $this->belongsTo('App\Rol','role_id','id');
    }

    
    public static function findByPhone($phone){
        return User::where(compact('phone'))->first();
    }

    public static function findByEmail($phone){
        return User::where(compact('email'))->first();
    }
}
