<?php

// Admin
Route::group(['prefix' => 'admin', 'as' => 'admin.', 'middleware' => ['web']], function () {
    Route::group(['prefix' => 'blog', 'as' => 'blog.'], function () {
        // Blogcategories
        Route::group(['prefix' => 'blogcategories', 'as' => 'blogcategories'], function () {
            // Blogcategories - URL: /admin/blogcategories
            Route::get('/', function () {
                $blogcategories = blog\blogsystem\Models\BlogCategory::paginate(20);
                return view('blog::admin.blogcategories.index', compact('blogcategories'));
            })->name('.index');

            // Create BlogCategory - URL: /admin/blogcategories/create
            Route::get('create', function () {

                $translatablefields = blog\blogsystem\Models\BlogCategory::translatablefields();

                return view('blog::admin.blogcategories.create', compact('translatablefields'));
            })->name('.create');

            // BlogCategory - URL: /admin/blogcategories/{category}
            Route::get('{blogcategory}', function ($blogcategory) {
                $blogcategory = blog\blogsystem\Models\BlogCategory::find($blogcategory);
                return view('blog::admin.blogcategories.show', compact('blogcategory'));
            })->where('blogcategory', '[0-9]+')->name('.show');
        });

        Route::resource('blogcategories', 'blog\blogsystem\BlogcategoriesController', ['only' => [
            'store', 'update', 'destroy',
        ]]);
        // Posts
        Route::group(['prefix' => 'posts', 'as' => 'posts'], function () {
            Route::get('/', function () {
                $posts = blog\blogsystem\Models\Post::paginate(20);
                return view('blog::admin.posts.index', compact('posts'));
            })->name('.index');
            // Create Post - URL: /admin/posts/create
            Route::get('create', function () {
                $translatablefields = blog\blogsystem\Models\Post::translatablefields();
                return view('blog::admin.posts.create', compact('translatablefields'));
            })->name('.create');

            // Post - URL: /admin/posts/{post}
            Route::get('{post}', function ($post) {
                $post = blog\blogsystem\Models\Post::find($post);

                return view('blog::admin.posts.show', compact('post'));
            })->where('post', '[0-9]+')->name('.show');

        });

        Route::resource('posts', 'blog\blogsystem\PostsController', ['only' => [
            'store', 'update', 'destroy',
        ]]);
    });

});

Route::group(['prefix' => 'blog', 'as' => 'blog'], function () {
    Route::get('/', 'blog\blogsystem\BlogController@index');

    Route::get('blogcategories', function () {
        $blogcategories = blog\blogsystem\Models\Blogcategory::all();
        return view('front.shop.blogcategories.grid', compact('blogcategories'));
    })->name('.blogcategories');

    Route::get('blogcategories/{categoryuri}/{subcategoryuri?}/{producturi?}/{query?}', 'blog\blogsystem\BlogController@url')
        ->where([
            'query'          => '.+',
            'categoryuri'    => '[0-9A-Za-z\-]+',
            'subcategoryuri' => '[0-9A-Za-z\-]+',
            'posturi'        => '[0-9A-Za-z\-]+',
        ])
        ->name('.blogcategory');

});
