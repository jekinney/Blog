@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <section class="col-md-9">
            @foreach($articles as $article)
                <div class="panel panel-default">
                    <header class="panel-heading">
                        <h2><a href="{{ route('blogs.article.show', $article->slug) }}">{{ $article->title }}</a></h2>
                        <ul class="list-inline">
                            <li>Author: {{ $article->authorname->username }}</li>
                            <li>Published: {{ $article->publish_at->diffForHumans() }}</li>
                        </ul>
                    </header>

                    <div class="panel-body">
                        {!! $article->overview !!}
                    </div>

                    <footer class="panel-footer text-right">
                        <a href="{{ route('blogs.article.show', $article->slug) }}">Read more..</a>
                    </footer>
                    
                </div>
            @endforeach
        </section>
        <aside class="col-md-3">
            @include('front.blogs.category.partials.category-menu')
        </aside>
    </div>
    <footer class="text-center">
        {{ $articles->links() }}
    </footer>
</div>
@endsection