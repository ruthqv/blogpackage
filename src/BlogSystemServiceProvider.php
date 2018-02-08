<?php

namespace blog\blogsystem;

use blog\blogsystem\Models\Blogcategory;
use DB;
use Illuminate\Contracts\Events\Dispatcher;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\ServiceProvider;
use JeroenNoten\LaravelAdminLte\Events\BuildingMenu;

class BlogSystemServiceProvider extends ServiceProvider
{
    
    public function boot(Dispatcher $events)
    {
        
        $this->loadViewsFrom(__DIR__ . '/views', 'blog');


        $this->publishes([
            __DIR__ . '/views' => resource_path('views/vendor/blog'),
        ], 'blog-views');

        $this->publishes([
            __DIR__ . '/migrations' => database_path('migrations'),
        ], 'blog-migrations');


        
        $this->loadRoutesFrom(__DIR__ . '/routes.php');

        if (file_exists($file = __DIR__ .'/Helpers/BlogSystemHelper.php')) {
            require $file;
        }
        
        $events->listen(BuildingMenu::class, function (BuildingMenu $event) {
            $event->menu->add([
                'icon'    => 'file',
                'text'    => 'Blog',
                'url'     => '#',
                'submenu' => [
                    [
                        'text' => 'Posts',
                        'url'  => route('admin.blog.posts.index'),
                    ],

                    [
                        'text' => 'Categories',
                        'url'  => route('admin.blog.blogcategories.index'),
                    ],

                ],
            ]);

        });

        if ((DB::connection()->getDatabaseName()) && (Schema::hasTable('blogcategories'))) {

            $blogcategories['all'] = Blogcategory::all();

            app()->global = [

                'blogcategories' => $blogcategories,

            ];

            // Also share $blogcategories
            view()->share(compact('blogcategories'));

        }

    }


    public function register()
    {
        $this->app->bind('blogcategory','blog\blogsystem\BlogcategoriesController');
        $this->app->bind('post','blog\blogsystem\PostsController');
        $this->app->make('blog\blogsystem\BlogController');
        $this->app->make('blog\blogsystem\BlogcategoriesController');
        $this->app->make('blog\blogsystem\PostsController');

    }
}
