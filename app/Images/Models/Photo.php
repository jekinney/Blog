<?php

namespace App\Images\Models;

use Illuminate\Database\Eloquent\Model;

class Photo extends Model
{
    protected $fillable = [
    	'album_id',
    	'title',
    	'description',
    	'original',
    	'thumbnail',
    	'small',
    	'small_size',
    	'medium',
    	'medium_size',
    	'large',
    	'large_size',
    	'hidden',
    ];

    protected $casts = [
    	'album_id' => 'integer',
    	'hidden' => 'boolean',
    ];

    public function album()
    {
    	return $this->belongsTo(Album::class);
    }
}
