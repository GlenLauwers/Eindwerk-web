<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOntwikkelaarsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('ontwikkelaars', function(Blueprint $table)
		{
			$table->increments('id_ontwikkelaars');
			$table->string('ontwikkelaars');
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
		Schema::drop('ontwikkelaars');
	}

}
