<?php namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\UserRequest;
use App\Http\Requests;
use Request;
use App\User;
use Auth;


class PagesRegisterController extends Controller {

	public function register(userrequest $Request)
	{
		$input = request::all();
		var_dump($input);
		$familienaam = $input['familienaam'];
		$voornaam = $input['voornaam'];
		$email = $input['email'];
		$wachtwoord = $input['wachtwoord'];
		$adres = $input['adres'];
		$bus = $input['bus'];
		$postcode = $input['postcode'];
		$gemeente = $input['gemeente'];
		$land = $input['land'];
		$telefoon = $input['telefoon'];
		$actief = 0;
		$type = 'klant';

		$hashed_wachtwoord = md5($wachtwoord);

		$user = new User;
			$user->voornaam = $voornaam;
			$user->familienaam = $familienaam;
			$user->email = $email;
			$user->wachtwoord = $hashed_wachtwoord;
			$user->adres = $adres;
			$user->bus = $bus;
			$user->postcode = $postcode;
			$user->gemeente = $gemeente;
			$user->land = $land;
			$user->telefoon = $telefoon;
			$user->actief = $actief;
			$user->type = $type;

		$user->save();

		Auth::login($user);

		flash()->success('Welkom, u bent ingelogd.');
		return redirect('dashboard');
	}

	public function login()
	{
		$input = Request::all();
		var_dump($input);
		$mail = $input['mail'];
		$wachtwoord = $input['wachtwoord'];
		$hashed_wachtwoord = md5($wachtwoord);
		$users = User::where('actief', '=', 0)->where('type', '=', 'klant')->where('email', '=', $mail)->get();
		
		if (!isset($users[0])) 
		{
			flash()->error('Het e-mailadres en/of wachtwoord is niet correct. Probeer opnieuw');
			return redirect('login');
		}

		else
		{
			if ($users[0]['attributes']['wachtwoord'] != $hashed_wachtwoord) 
			{
				flash()->error('Het e-mailadres en/of wachtwoord is niet correct. Probeer opnieuw');
				return redirect('login');
			}
	

			else
			{
				$id = $users[0];
				Auth::login($id);
				flash()->success('Welkom, u bent ingelogd.');
				return redirect('home');
			}
		}
	}

	public function logout()
	{	
		$user = Auth::user();
		Auth::logout($user);
		flash()->success('U bent uitgelogd. Tot de volgende keer.');
		return redirect('login');
	}

}
