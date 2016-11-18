<section class="panel panel-default">
	<header class="panel-heading text-center">
		<h2 class="panel-title">Categories</h2>
	</header>
	<div class="list-group text-center">
		@foreach($categoryMenu as $category)
			<a href="{{ route('blogs.category.show', $category->slug) }}" class="list-group-item">
				{{ $category->title }}
			</a>
		@endforeach
	</div>
</section>
