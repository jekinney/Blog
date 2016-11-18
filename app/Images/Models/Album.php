<?php

namespace App\Images\Models;

use Illuminate\Database\Eloquent\Model;

class Album extends Model
{
    protected $fillable = [
    	'owner_id',
    	'slug',
    	'name',
    	'description',
    	'display_order',
    	'hidden',
    ];

    protected $casts = [
    	'owner_id' => 'integer',
    	'display_order' => 'integer',
    	'hidden' => 'boolean',
    ];

    public function owner()
    {
    	return $this->belongsTo(\App\Users\Models\User::class, 'owner_id', 'id');
    }

    public function photos()
    {
    	return $this->hasMany(Photo::class);
    }
}
