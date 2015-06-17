<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Winkelmand extends Model {

	protected $fillable = [

		'artikel_id','user_id', 'actief'
	];

	protected $primaryKey = "id_winkelmand";

}
