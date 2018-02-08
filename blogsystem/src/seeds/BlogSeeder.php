<?php
namespace blog\blogsystem;

use Illuminate\Database\Seeder;

class BlogSeeder extends Seeder
{

    public function run()
    {
        $this->call(table_blog_categories::class);
        $this->call(table_blog_posts::class);
        $this->call(table_blog_langsandphotos::class);
    }
}
