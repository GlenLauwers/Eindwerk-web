<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('users', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('voornaam');
			$table->string('familienaam');
			$table->string('email')->unique();
			$table->string('adres');
			$table->string('bus');
			$table->string('postcode');
			$table->string('gemeente');
			$table->string('telefoon');
			$table->date('geboortedatum');
			$table->string('password', 60);
			$table->rememberToken();
			$table->timestamps();
			$table->string('salt', 60);
			$table->boolean('nieuwsbrief');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('users');
	}

}

/*$table->increments('id');
			$table->string('voornaam');
			$table->string('familienaam');
			$table->string('email')->unique();
			$table->string('adres');
			$table->string('bus');
			$table->string('postcode');
			$table->string('gemeente');
			$table->string('telefoon');
			$table->timestamps('last-login');
			$table->timestamps('lid-sinds');
			$table->date('geboortedatum');
			$table->string('password', 60);
			$table->string('salt', 60);
			$table->boolean('nieuwsbrief');
			$table->string('soort-gebruiker')*/
