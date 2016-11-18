@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
         <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <header class="panel-heading clearfix">
                    <h2 class="panel-title">
                        <a href="{{ route('blogs.category.show', $category->slug) }}" class="pull-left">{{ $category->title }}</a>
                        <span class="pull-right">{{ $category->articles_count }}</span>
                    </h2>
                </header>

                <div class="panel-body">
                    <p>{{ $category->description }}</p>
                </div>
            </div>
        </div>
    </div>
    
    @foreach($category->articles as $article)
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <header class="panel-heading">
                        <h2 class="panel-title">
                            <a href="{{ route('blogs.article.show', $article->slug) }}">{{ $article->title }}</a>
                        </h2>
                    </header>

                    <div class="panel-body">
                        <p>{{ $article->overview }}</p>
                    </div>
                </div>
            </div>
        </div>
    @endforeach

    <div class="text-center">
        
    </div>

</div>
@endsection
