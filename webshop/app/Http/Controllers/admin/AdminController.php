<?php namespace App\Http\Controllers\admin;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\console;
use App\User;
use App\genres;
use App\ontwikkelaars;
use App\Artikels;
use Request;
use Auth;


class AdminController extends Controller {

	public function login()
	{
		if (Auth::user()) 
		{
			return redirect('admin');
		}

		else
		{
			$title = ('Login - Admin');
			return view('admin.login', compact('title'));
		}
	}

	public function login_checker()
	{
		$input = Request::all();
		$gebruikersnaam = $input['gebruikersnaam'];
		$wachtwoord = $input['wachtwoord'];
		$hashed_wachtwoord = md5($wachtwoord);
		$users = User::where('actief', '=', 0)->where('type', '=', 'admin')->where('email', '=', $gebruikersnaam)->get();
		
		if (!isset($users[0])) 
		{
			flash()->error('Het e-mailadres en/of wachtwoord is niet correct. Probeer opnieuw');
			return redirect('admin-login');
		}
	else
		{
			if ($users[0]['attributes']['wachtwoord'] != $hashed_wachtwoord) 
			{
				flash()->error('Het e-mailadres en/of wachtwoord is niet correct. Probeer opnieuw');
				return redirect('admin-login');
			}
	

			else
			{
				$id = $users[0];
				Auth::login($id);
				flash()->success('Welkom, u bent ingelogd.');
				return redirect('admin');
			}
		}
	}

	public function logout()
	{	
		$user = Auth::user();
		Auth::logout($user);
		flash()->success('U bent uitgelogd. Tot de volgende keer.');
		return redirect('admin-login');

	}

	public function home()
	{
		if (Auth::user()->type != 'admin') 
		{
			return redirect('/');
		}
		
		else
		{
			$title = ('Home - Admin');
			return view('admin.home', compact('title'));
		}
	}

	public function consoles()
	{
		if (Auth::user()->type != 'admin') 
		{
			return redirect('/');
		}
		
		else
		{
			$title = ('Console - Admin');
			$consoles = console::where('actief', '=', 0)->get();
			return view('admin.consoles.consoles', compact('title', 'consoles'));
		}
	}

	public function genres()
	{
		if (Auth::user()->type != 'admin') 
		{
			return redirect('/');
		}
		
		else
		{
			$title = ('Genres - Admin');
			$genres = genres::where('actief', '=', 0)->get();
			return view('admin.genres.genres', compact('title', 'genres'));
		}
	}

	public function ontwikkelaars()
	{
		if (Auth::user()->type != 'admin') 
		{
			return redirect('/');
		}
		
		else
		{
			$title = ('Ontwikkelaars - Admin');
			$ontwikkelaars = ontwikkelaars::where('actief', '=', 0)->get();
			return view('admin.ontwikkelaars.ontwikkelaars', compact('title', 'ontwikkelaars'));
		}
	}

	public function artikels()
	{
		if (Auth::user()->type != 'admin') 
		{
			return redirect('/');
		}
		
		else
		{	

			$title = ('Artikels - Admin');
			$artikels = Artikels::where('artikels.actief', '=', 0)->join('consoles', 'consoles.id_consoles', '=', 'artikels.console_id')->get();
			return view('admin.artikels.artikels', compact('title', 'artikels'));
		}
	}
}
