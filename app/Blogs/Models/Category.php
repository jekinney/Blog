<?php

namespace App\Blogs\Models;

use App\Blogs\Queries\EloquentCategories;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use EloquentCategories;

    protected $table = 'blog_categories';

    protected $fillable = [
    	'slug',
    	'title',
    	'description',
    	'display_order',
    ];

    protected $casts = [
    	'display_order' => 'integer',
    ];

    public function articles()
    {
    	return $this->hasMany(Article::class);
    }
}
