@extends('layouts.app')

@section('content')
<main class="container">
    <header class="page-header text-center">
        <h1>{{ $article->title }}</h1>
    </header>
    
    <section class="panel panel-default">

        <header class="panel-heading">
            <ul class="list-inline">
                <li>Author: {{ $article->authorname->username }}</li>
                <li>Published: {{ $article->publish_at->diffForHumans() }}</li>
                <li>from category: <a href="{{ route('blogs.category.show', $article->category->slug) }}">{{ $article->category->title }}</a></li>
            </ul>
        </header>

        <article class="panel-body">
            {!! $article->body !!}
        </article>

    </section>
</main>
@endsection