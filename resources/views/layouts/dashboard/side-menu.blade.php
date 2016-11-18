<section class="panel panel-default">
	<header class="panel-heading text-center">
		<h2 class="panel-title">Dashboard</h2>
	</header>
	<div class="list-group">
		<a href="{{ route('dash.home') }}" class="list-group-item">Dashboard</a>
	</div>
	@if($user->hasPermission('blog-dashboard-access'))
		<ul class="list-group">
			<li class="list-group-item" @click="showBlog">Blog</li>
			<div v-if="blog" class="list-group text-center">
				@if($user->hasPermission('category-dashboard-access'))
					<a href="{{ route('dash.blog.category.index') }}" class="list-group-item">Categories</a>
				@endif
				@if($user->hasPermission('article-dashboard-access'))
					<a href="" class="list-group-item">Articles</a>
				@endif
			</div>
		</ul>
	@endif
	@if($user->hasPermission('images-dashboard-access'))
		<ul class="list-group">
			<li class="list-group-item" @click="showImage">Image</li>
			<div v-if="image" class="list-group text-center">
				<a href="" class="list-group-item">Albums</a>
				<a href="" class="list-group-item">Images</a>
			</div>
		</ul>
	@endif
	@if($user->hasPermission('user-dashboard-access'))
		<ul class="list-group">
			<li class="list-group-item" @click="showUser">User</li>
			<div v-if="user" class="list-group text-center">
				<a href="" class="list-group-item">List</a>
				<a href="" class="list-group-item">Roles</a>
			</div>
		</ul>
	@endif
</section>