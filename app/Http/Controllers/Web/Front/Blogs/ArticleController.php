<?php

namespace App\Http\Controllers\Web\Front\Blogs;

use App\Blogs\Models\Article;
use App\Http\Controllers\Controller;

class ArticleController extends Controller
{
    public function index(Article $article)
    {
    	$articles = $article->indexViewData(3);

    	return view('front.blogs.article.index', compact('articles'));
    }

    public function show($slug, Article $article)
    {
    	$article = $article->showViewData($slug);

    	return view('front.blogs.article.show', compact('article'));
    }
}
