<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Tag;
use App\Post;
use Illuminate\Support\Facades\Blade;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        view()->composer('layouts.sidebar', function($view){
            $tags = Tag::has('posts')->pluck('name');
            $popularPosts = Post::popular();

            $view->with(compact('tags', 'popularPosts'));
        });

        view()->composer('layouts.nav', function($view){
            $view->with('cats', \App\Cat::all());
        });

        Blade::directive('role', function($role){
            return "<?php if( auth()->check()  && auth()->user()->hasRole($role) ) { ?>";
        });
        Blade::directive('endrole', function(){
            return "<?php } ?>";
        });
    }
}
