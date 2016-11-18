<?php

namespace App\Http\Controllers\Web\Front\Blogs;

use App\Blogs\Models\Category;
use App\Http\Controllers\Controller;

class CategoryController extends Controller
{
    public function index(Category $category)
    {
    	$categories = $category->indexViewData();

    	return view('front.blogs.category.index', compact('categories'));
    }

    public function show($slug, Category $category)
    {
    	$category = $category->showViewData($slug);

    	return view('front.blogs.category.show', compact('category'));
    }

}
