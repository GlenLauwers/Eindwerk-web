<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateScreenshotsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('screenshots', function(Blueprint $table)
		{
			$table->increments('id_screenshots');
			$table->string('screenshot');
			$table->string('artikels_id');
			$table->boolean('actief');
			$table->timestamps();
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('screenshots');
	}

}
