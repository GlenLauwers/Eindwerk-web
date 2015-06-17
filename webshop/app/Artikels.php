<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Artikels extends Model {

	protected $fillable = [

		'naam', 'genre_id', 'ontwikkelaars_id', 'console_id', 'beschrijving', 'prijs', 'release_datum', 'cover', 'trailer', 'screenshots_id', 'actief'
	];

	protected $primaryKey = "id_artikels";

}
