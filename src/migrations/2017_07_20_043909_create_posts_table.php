<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreatePostsTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('posts', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name',100)->index('posts_name');
            $table->integer('user_id')->unsigned()->nullable();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->string('uri', 50)->index('posts_uri')->unique();
            $table->text('description');
            $table->integer('blogcategory_id')->unsigned()->nullable();
            $table->foreign('blogcategory_id')->references('id')->on('blogcategories')->onDelete('cascade');
            $table->boolean('menu')->default(1);
            $table->boolean('special')->default(1);
            $table->boolean('new')->default(0)->index('posts_new');
            $table->integer('order')->default(0);
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
        Schema::drop('posts');
    }

}
