<?php

namespace App\Blogs\Models;

use App\Blogs\Queries\EloquentArticles;
use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    use EloquentArticles;
    
	protected $table = 'blog_articles';
	
    protected $fillable = [
    	'category_id',
    	'author_id',
    	'slug',
    	'title',
    	'overview',
    	'body',
    	'draft',
    	'commentable',
    	'publish_at',
    ];

    protected $casts = [
    	'category_id' => 'integer',
    	'author_id' => 'integer',
    	'draft' => 'boolean',
    	'commentable' => 'boolean',
    ];

    protected $dates = [
    	'publish_at',
    ];

    public function category()
    {
    	return $this->belongsTo(Category::class);
    }

    public function author()
    {
        return $this->belongsTo(\App\Users\Models\User::class, 'author_id', 'id');
    }

    public function authorname()
    {
    	return $this->belongsTo(\App\Users\Models\User::class, 'author_id', 'id')->select('id', 'username');
    }
}
