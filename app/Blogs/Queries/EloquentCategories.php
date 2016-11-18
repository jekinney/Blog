<?php

namespace App\Blogs\Queries;

trait EloquentCategories
{
	public static function menuList()
	{
		$data = self::orderBy('display_order', 'asc')
			->get(['id', 'slug', 'title', 'description']);

		$data = self::articlesCount($data);

		return $data->sortBy('articles_count');
	}

	public function indexViewData()
	{
		$data = $this->orderBy('display_order', 'asc')
			->get(['id', 'slug', 'title', 'description']);

		$this->articlesCounts($data);

		return $data;
	}

	public function showViewData($slug)
	{
		$data = $this->with(['articles' => function($q) {
				$q->whereDraft('0');
				$q->where('publish_at', '<', \Carbon\Carbon::now());
				$q->select('id', 'category_id', 'slug', 'title', 'overview', 'publish_at');
				$q->paginate(5);
		}])
		->where('slug', $slug)
		->first(['id', 'slug', 'title', 'description']);

		$this->articleCount($data);

		return $data;
	}

	public function adminIndexViewData()
	{
		$data = $this->orderBy('display_order', 'asc')
			->get(['id', 'slug', 'title', 'description', 'display_order']);

		$this->articlesCounts($data);

		return $data;
	}

	public function adminShowViewData($slug)
	{
		$data = $this->with(['articles' => function($q) {
				$q->whereDraft('0');
				$q->where('publish_at', '<', \Carbon\Carbon::now());
				$q->select('id', 'category_id', 'slug', 'title', 'overview', 'publish_at');
				$q->paginate(5);
		}])
		->where('slug', $slug)
		->first(['id', 'slug', 'title', 'description', 'display_order']);

		$this->articleCount($data);

		return $data;
	}

	public function processSubmit($request)
	{
		if($request->has('id')) {
			return $this->find($request->id)->update($request->all());
		} 
		return $this->create($request->all());
	}


	protected function articleCount($category)
	{
		return array_add($category, 'articles_count', $category->articles()->count());
	}

	public function articlesCounts($categories)
	{
		return $categories->each(function($cat, $key) {
			return $this->articleCount($cat);
		});
	}

	protected static function articlesCount($categories)
	{
		return $categories->each(function($cat, $key) {
			return array_add($cat, 'articles_count', $cat->articles()->count());
		});
	}
}