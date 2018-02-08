<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreatePhotosTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('photos', function(Blueprint $table)
		{
			$table->integer('id', true);
			$table->string('name',100)->index('photos_name');
			$table->string('original_name',255)->nullable()->index('photos_original_name');
            $table->morphs('photostable',255); //la clave de todo

			$table->boolean('default')->default(0);
			$table->integer('brand')->default(0);

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
		Schema::drop('photos');
	}

}
