<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFactuursTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('factuurs', function(Blueprint $table)
		{
			$table->increments('id_factuur');
			$table->string('user_id');
			$table->string('naam');
			$table->string('adres');
			$table->string('bus');
			$table->string('postcode');
			$table->string('gemeente');
			$table->string('prijs');
			$table->string('status');
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
		Schema::drop('factuurs');
	}

}
