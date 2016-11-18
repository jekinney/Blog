<?php

namespace App\Blogs\Observers;

use App\Helpers\Slugs;
use App\Blogs\Models\Category;

class Categories
{
	/**
     * Listen to the Category creating event.
     *
     * @param  Category  $category
     * @return void
     */
    public function creating(Category $category)
    {
        $category->slug = Slugs::make($category->title);
    }

    public function created(Category $category)
    {
        // fire event to re-order categories;
    }

    /**
     * Listen to the Category updating event.
     *
     * @param  Category  $category
     * @return void
     */
    public function updating(Category $category)
    {
        $category->slug = Slugs::make($category->title);
    }

    public function updated(Category $category)
    {
        // fire same event to re-order categories;
    }
}