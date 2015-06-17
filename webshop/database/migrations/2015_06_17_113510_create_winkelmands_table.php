<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateWinkelsmandTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('winkelmands', function(Blueprint $table)
		{
			$table->increments('id_winkelmand');
			$table->string('artikel_id');
			$table->string('user_id');
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
		Schema::drop('winkelmands');
	}

}
