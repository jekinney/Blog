<?php

namespace App\Http\Controllers\Web\Front\Blogs;

use App\Blogs\Models\Tag;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class TagController extends Controller
{
    public function index(Tag $tag)
    {
    	$tags = $tag->indexViewData();

    	return view('front.blogs.tag.index', compact('tags'));
    }

    public function show(Tag $tag)
    {
    	$tag = $tag->showViewData();

    	return view('front.blogs.tag.show', compact('tag'));
    }
}
