<?php

namespace App;

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
        'firstname', 'lastname', 'contact_number', 'business_role', 'user_role', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function role()
    {
        return $this->hasOne(UserRole::class,'id','user_role');
    }

    public function isAdmin() {
        return ($this->role->type === 'Admin')? true : false;
    }

    public function isOwner() {
        return ($this->role->type === 'Owner')? true : false;
    }

    public function isNormal() {
        return ($this->role->type === 'Normal')? true : false;
    }
}
