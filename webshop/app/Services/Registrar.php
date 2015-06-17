<?php namespace App\Services;

use App\User;
use Validator;
use Illuminate\Contracts\Auth\Registrar as RegistrarContract;

class Registrar implements RegistrarContract {

	/**
	 * Get a validator for an incoming registration request.
	 *
	 * @param  array  $data
	 * @return \Illuminate\Contracts\Validation\Validator
	 */
	public function validator(array $data)
	{
		return Validator::make($data, [
			'familienaam' => 'required|max:255',
			'voornaam' => 'required|max:255',
			'email' => 'required|email|max:255|unique:users',
			'wachtwoord' => 'required|confirmed|min:6',
			'telefoon' => 'numeric'
		]);
	}

	/**
	 * Create a new user instance after a valid registration.
	 *
	 * @param  array  $data
	 * @return User
	 */
	public function create(array $data)
	{
		return User::create([
			'familienaam' => $data['familienaam'],
			'voornaam' => $data['voornaam'],
			'email' => $data['email'],
			'wachtwoord' => bcrypt($data['wachtwoord']),
			'adres' => $data['adres'],
			'bus' => $data['bus'],
			'postcode' => $data['postcode'],
			'gemeente' => $data['gemeente'],
			'land' => $data['land'],
			'telefoon' => $data['telefoon'],
			'type' => 'klant',
			'actief' => 0,
		]);
	}

}
