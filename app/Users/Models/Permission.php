<?php

namespace App\Users\Models;

use Illuminate\Database\Eloquent\Model;

class Permission extends Model
{
    protected $fillable = [
    	'slug',
		'name',
		'description',
		'site',
		'dashboard',
		'blog',
		'image',
		'user',
    ];

    protected $casts = [
    	'slug' => 'string',
    	'site' => 'boolean',
		'dashboard' => 'boolean',
		'blog' => 'boolean',
		'image' => 'boolean',
		'user' => 'boolean',
    ];

    public function roles()
    {
    	return $this->belongsToMany(Role::class)->withTimestamps();
    }
}
