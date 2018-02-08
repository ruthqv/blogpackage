<?php
namespace blog\blogsystem;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class table_blog_categories extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        \DB::table('blogcategories')->insert(array(
            'name'       => 'blogcategory-1',
            'uri'        => 'blogcategory-1',
            'menu'       => 0,
            'special'    => 1,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s'),
        ));

        \DB::table('blogcategories')->insert(array(
            'name'       => 'blogcategory-2',
            'special'    => 1,
            'uri'        => 'blogcategory-2',
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s'),
        ));


    }
}
