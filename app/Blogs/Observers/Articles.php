<?php

namespace App\Blogs\Observers;

use App\Helpers\Slugs;
use App\Blogs\Models\Article;

class Articles 
{
	/**
     * Listen to the Article creating event.
     *
     * @param  Article  $article
     * @return void
     */
    public function creating(Article $article)
    {
        $article->slug = Slugs::makeWithDate($article->title, $article->created_at);
    }

    /**
     * Listen to the Article updating event.
     *
     * @param  Article  $article
     * @return void
     */
    public function updating(Article $article)
    {
        $article->slug = Slugs::makeWithDate($article->title, $article->created_at);
    }
}