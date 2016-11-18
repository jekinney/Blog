<?php

namespace App\Users\Models;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    protected $fillable = [
    	'slug',
    	'name',
    	'description',
    ];

    public function permissions()
    {
    	return $this->belongsToMany(Permission::class)->withTimestamps();
    }

    public function users()
    {
    	return $this->belongsToMany(User::class)->withTimestamps();
    }
}
