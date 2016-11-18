<?php

namespace App\Users\Models;

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
        'username', 
        'email', 
        'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 
        'remember_token',
    ];

    public function setPasswordAttribute($password)
    {
        return $this->attributes['password'] = bcrypt($password);
    }

    public function roles()
    {
        return $this->belongsToMany(Role::class)->withTimestamps();
    }

    public function dashboard()
    {
        return $this->hasPermission('dashboard-access');
    }

    public function hasPermission($permSlug)
    {
        foreach($this->roles as $role)
        {
            foreach($role->permissions as $permission)
            {
                if(str_is($permission->slug, $permSlug))
                {
                    return true;
                }
            }
        }
        return false;
    }
}
