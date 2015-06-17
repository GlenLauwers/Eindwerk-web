<?php namespace App\Http\Requests;

use App\Http\Requests\Request;

class ArtikelRequest extends Request {

	/**
	 * Determine if the user is authorized to make this request.
	 *
	 * @return bool
	 */
	public function authorize()
	{
		return true;
	}

	/**
	 * Get the validation rules that apply to the request.
	 *
	 * @return array
	 */
	public function rules()
	{
		return [
			'naam' =>'required|min:3',
			'beschrijving' =>'required',
			'prijs' => 'numeric',
			'release_datum' => 'date',
			'console' => 'min:1',
			'genre' => 'min:1',
			'ontwikkelaar' => 'min:1',
			'aantal' => 'numeric',
		];
	}

	//laravel.com/docs/validation

}
