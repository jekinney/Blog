@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        @foreach($categories as $category)
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
        @endforeach
    </div>
</div>
@endsection
