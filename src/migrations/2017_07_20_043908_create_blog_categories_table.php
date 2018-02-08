<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateBlogCategoriesTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('blogcategories', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name', 100)->index('blogcategories_name');
            $table->text('description')->nullable();
            $table->string('uri', 50)->unique();
            $table->integer('parent_id')->unsigned()->default(0)->index('blogcategories_parent_id');
            $table->integer('order')->default(0);
            $table->boolean('menu')->default(0);
            $table->boolean('special')->default(0);

            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('blogcategories');
    }

}
