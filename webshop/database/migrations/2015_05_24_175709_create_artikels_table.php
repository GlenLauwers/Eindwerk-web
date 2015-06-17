<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateArtikelsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('artikels', function(Blueprint $table)
		{
			$table->increments('id_artikels');
			$table->string('naam');
			$table->string('genre_id');
			$table->string('ontwikkelaars_id');
			$table->string('console_id');
			$table->longText('beschrijving');
			$table->decimal('prijs');
			$table->date('release_datum');
			$table->string('cover');
			$table->string('trailer');
			$table->boolean('actief');
			$table->string('aantal');
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
		Schema::drop('artikels');
	}
}
