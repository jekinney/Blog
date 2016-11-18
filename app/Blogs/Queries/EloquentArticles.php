<?php

namespace App\Blogs\Queries;

trait EloquentArticles
{
	public function indexViewData($amount = 5)
	{
		return $this->with('category', 'authorname')
			->whereDraft(0)
			->whereNotNull('publish_at')
			->where('publish_at', '<', \Carbon\Carbon::now()->toDateTimeString())
			->select('author_id', 'category_id', 'slug', 'title', 'overview', 'publish_at')
			->paginate($amount);
	}

	public function showViewData($slug)
	{
		return $this->with('category', 'authorname')
			->where('slug', $slug)
			->select('author_id', 'category_id', 'slug', 'title', 'body', 'publish_at')
			->first();
	}
}