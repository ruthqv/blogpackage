<?php
namespace blog\blogsystem;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class table_blog_posts extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        // dos post en la categoria 1(MODA)

        \DB::table('posts')->insert(array(
            'name'            => 'blog-post-1',
            'uri'             => 'blog-post-1',

            'description'     => 'Lorem ipsum dolor',
            'blogcategory_id' => 1,
            'user_id'         => 1,
            'new'             => 1,
            'special'         => 1,
            'created_at'      => date('Y-m-d H:m:s'),
            'updated_at'      => date('Y-m-d H:m:s'),
        ));

        \DB::table('posts')->insert(array(
            'name'            => 'blog-post-2',

            'uri'             => 'blog-post-2',
            'description'     => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit.',
            'blogcategory_id' => 1,
            'user_id'         => 1,
            'new'             => 1,
            'special'         => 1,
            'created_at'      => date('Y-m-d H:m:s'),
            'updated_at'      => date('Y-m-d H:m:s'),
        ));

        // dos post en la categoria 2 (TENDENCIAS)

        \DB::table('posts')->insert(array(
            'name'            => 'blog-post-3',

            'uri'             => 'blog-post-3',
            'description'     => 'Lorem ipsum dolor sit amet,',
            'blogcategory_id' => 2,
            'user_id'         => 1,
            'new'             => 1,
            'special'         => 1,
            'created_at'      => date('Y-m-d H:m:s'),
            'updated_at'      => date('Y-m-d H:m:s'),
        ));

        \DB::table('posts')->insert(array(
            'name'            => 'blog-post-4',

            'uri'             => 'blog-post-4',
            'description'     => 'Lorem ipsum dolor sit amet,',
            'blogcategory_id' => 2,
            'user_id'         => 1,
            'new'             => 1,
            'special'         => 1,
            'created_at'      => date('Y-m-d H:m:s'),
            'updated_at'      => date('Y-m-d H:m:s'),
        ));

    }
}
