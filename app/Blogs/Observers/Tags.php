<?php

namespace App\Blogs\Observers;

use App\Helpers\Slugs;
use App\Blogs\Models\Tag;

class Tags
{
	/**
     * Listen to the Tag creating event.
     *
     * @param  Tag  $tag
     * @return void
     */
    public function creating(Tag $tag)
    {
        $tag->slug = Slugs::make($tag->title);
    }

    /**
     * Listen to the Tag updating event.
     *
     * @param  Tag  $tag
     * @return void
     */
    public function updating(Tag $tag)
    {
        $tag->slug = Slugs::make($tag->title);
    }
}