<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
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
        'username', 'fullname', 'email', 'password', 'phone', 'address', 'avatar', 'role_id'
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
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function role(){
          return $this->hasOne('App\Models\Role','id','role_id'); 
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function comments(){
        return $this->hasMany('App\Models\Comment','user_id','id'); 
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function carts(){
        return $this->hasMany('App\Models\Cart','user_id','id'); 
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function orders(){
        return $this->hasMany('App\Models\Order','user_id','id'); 
    }
}
