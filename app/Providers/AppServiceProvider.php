<?php

namespace App\Providers;

use App\Blogs\Models\Category;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        View::composer('*', function($view) {
            $view->with('user', auth()->check()? auth()->user():null);
        });

        View::composer('front.blogs.category.partials.category-menu', function($view) {
            $view->with('categoryMenu', Category::menuList());
        });
        
        \App\Users\Models\Role::observe(\App\Users\Observers\Roles::class);
        \App\Users\Models\Permission::observe(\App\Users\Observers\Permissions::class);
        /**
        * Blog Observers
        */
        \App\Blogs\Models\Tag::observe(\App\Blogs\Observers\Tags::class);
        \App\Blogs\Models\Article::observe(\App\Blogs\Observers\Articles::class);
        \App\Blogs\Models\Category::observe(\App\Blogs\Observers\Categories::class);

    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
