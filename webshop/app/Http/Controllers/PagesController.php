<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Artikels;
use App\console;
use App\genres;
use App\Screenshots;
use App\Reviews;
use Auth;
use App\Http\Requests\UserRequest;
use Request;
use App\User;
use App\Winkelmand;

use Illuminate\Pagination\Paginator;


class PagesController extends Controller {

	public function home()
	{
		$title = 'Home - Game Action';
		$date = date('Y-m-d');

		$nieuw = Artikels::where('artikels.release_datum', '<=', $date)
								->join('consoles', 'console_id', '=', 'consoles.id_consoles')
								->join('ontwikkelaars', 'ontwikkelaars_id', '=', 'ontwikkelaars.id_ontwikkelaars')
								->join('genres', 'genre_id', '=', 'genres.id_genres')
								->take(5)
								->groupBy('artikels.naam')
								->get();

		$te_verwachten = Artikels::where('artikels.release_datum', '>', $date)
								->join('consoles', 'console_id', '=', 'consoles.id_consoles')
								->join('ontwikkelaars', 'ontwikkelaars_id', '=', 'ontwikkelaars.id_ontwikkelaars')
								->join('genres', 'genre_id', '=', 'genres.id_genres')
								->take(5)
								->groupBy('artikels.naam')
								->get();

		$console = console::get();
		
		return view('pages.home', compact('title', 'nieuw', 'console', 'te_verwachten'));
	}

	public function console($id)
	{
		

		$console = console::get();
		$genre = genres::get();
		$consoles = console::findOrFail($id);

		$artikels = Artikels::where('artikels.console_id', '=', $id)
								->where('artikels.actief', '=', 0)
								->join('consoles', 'console_id', '=', 'consoles.id_consoles')
								->join('ontwikkelaars', 'ontwikkelaars_id', '=', 'ontwikkelaars.id_ontwikkelaars')
								->join('genres', 'genre_id', '=', 'genres.id_genres')
								->paginate(12);

								
		$title =  $consoles->console .' games- Game Action';

		return view('pages.console', compact('title', 'console', 'consoles', 'artikels', 'genre'));
	}

	public function over_ons()
	{
		$title = 'Over ons - Game Action';
		$console = console::get();
		return view('pages.over_ons', compact('title', 'console'));
	}

	public function games ($id)
	{
		$console = console::get();

		$artikels = Artikels::where('artikels.id_artikels', '=', $id)
								->where('artikels.actief', '=', 0)
								->join('consoles', 'console_id', '=', 'consoles.id_consoles')
								->join('ontwikkelaars', 'ontwikkelaars_id', '=', 'ontwikkelaars.id_ontwikkelaars')
								->join('genres', 'genre_id', '=', 'genres.id_genres')
								->get();

		$review = Reviews::where('reviews.artikels_id', '=', $id )
								->where('reviews.actief', '=', 0)
								->join('artikels', 'artikels_id', '=', 'artikels.id_artikels')
								->join('users', 'users_id', '=', 'users.id')
								->get();
						
		$beschikbaar_op = Artikels::where('naam', '=', $artikels[0]['naam'])->join('consoles', 'console_id', '=', 'consoles.id_consoles')->get();

		$screenshots = Screenshots::where('artikels_id', '=', $id)->where('actief', '=', 0)->get();

		$title = $artikels[0]['naam'] .' - Game Action';

		return view('pages.artikel', compact('title', 'console', 'artikels', 'beschikbaar_op', 'screenshots', 'review'));
	}

	public function login()
	{
		if (Auth::user()) 
		{
			return redirect('home');
		}
		else
		{
			$title = 'Login - Game Action';
			$console = console::get();
			return view('pages.login', compact('title', 'console'));
		}
	}

	public function register()
	{
		if (Auth::user()) 
		{
			return redirect('home');
		}
		else
		{
			$title = 'Registreren - Game Action';
			$console = console::get();
			return view('pages.registreren', compact('title', 'console'));
		}
	}

	public function dashboard()
	{
		$title = 'Dashboard - Game Action';
		$console = console::get();
		return view('pages.dashboard', compact('title','console'));
	}

	public function dashboard_wijzigen($id)
	{
		$title = 'Dashboard - Game Action';
		$console = console::get();
		$wijzigen = true;
		return view('pages.dashboard', compact('title','console', 'wijzigen'));
	}

	public function dashboard_wijzigen_confirmed($id, userrequest $Request)
	{
		$input = request::all();
		$familienaam = $input['familienaam'];
		$voornaam = $input['voornaam'];
		$email = $input['email'];
		$adres = $input['adres'];
		$bus = $input['bus'];
		$postcode = $input['postcode'];
		$gemeente = $input['gemeente'];
		$land = $input['land'];
		$telefoon = $input['telefoon'];

		$user_update = User::findOrFail($id);
			$user_update->familienaam = $familienaam;
			$user_update->voornaam = $voornaam;
			$user_update->email = $email;
			$user_update->adres = $adres;
			$user_update->bus = $bus;
			$user_update->postcode = $postcode;
			$user_update->gemeente = $gemeente;
			$user_update->land = $land;
			$user_update->telefoon = $telefoon;

			$user_update->save();

		flash()->success('Uw gegevens werden gewijzigd.');
		return redirect('dashboard');
	}

	public function search()
	{
		$input = request::all();
		$input = $input['zoeken'];

		$console = console::get();
		$genre = genres::get();

		$artikels = Artikels::where('artikels.naam', 'LIKE', '%'.$input.'%')
								->where('artikels.actief', '=', 0)
								->join('consoles', 'console_id', '=', 'consoles.id_consoles')
								->join('ontwikkelaars', 'ontwikkelaars_id', '=', 'ontwikkelaars.id_ontwikkelaars')
								->join('genres', 'genre_id', '=', 'genres.id_genres')
								->groupBy('artikels.naam')
								->paginate(12);

								
		$title = 'Zoeken - Game Action';

		if (empty($input)) 
		{
			$functie = false;
			$artikels = Artikels::where('artikels.naam', 'LIKE', $input)
								->where('artikels.actief', '=', 0)
								->join('consoles', 'console_id', '=', 'consoles.id_consoles')
								->join('ontwikkelaars', 'ontwikkelaars_id', '=', 'ontwikkelaars.id_ontwikkelaars')
								->join('genres', 'genre_id', '=', 'genres.id_genres')
								->groupBy('artikels.naam')
								->paginate(12);
			flash()->error('Uw zoekfunctie was leeg. Probeer opnieuw');
			return view('pages.search', compact('title', 'console', 'artikels', 'genre', 'input', 'functie'));
		}

		else
		{
			$functie = true;
			return view('pages.search', compact('title', 'console', 'artikels', 'genre', 'input', 'functie'));
		}

		
	}

	public function zoeken()
	{
		$artikels = Artikels::where('artikels.actief', '=', 0)
								->join('consoles', 'console_id', '=', 'consoles.id_consoles')
								->join('ontwikkelaars', 'ontwikkelaars_id', '=', 'ontwikkelaars.id_ontwikkelaars')
								->join('genres', 'genre_id', '=', 'genres.id_genres')
								->groupBy('artikels.naam')
								->paginate(12);

		$console = console::get();
		$genre = genres::get();
								
		$title = 'Zoeken - Game Action';
		$functie = true;
		return view('pages.search', compact('title', 'console', 'artikels', 'genre', 'functie'));
	}

	public function review($id)
	{
		$input = request::all();
		$gebruiker = $input['id'];
		$review = $input['review'];
		$date = date('Y-m-d');
		
		if (empty($review)) 
		{
			flash()->error('Uw review was leeg.');
		
			return redirect('games/'.$id);
		}

		else
		{
			$nieuwe_review = new Reviews;
			$nieuwe_review->review = $review;
			$nieuwe_review->users_id = $gebruiker;
			$nieuwe_review->datum = $date;
			$nieuwe_review->artikels_id = $id;

			$nieuwe_review->save();

			flash()->success('Uw review werd toegevoegd.');
		
			return redirect('games/'.$id);
		}
	}

	public function delete_review($id)
	{
		$review_verwijder = Reviews::findOrFail($id);

		$artikel = $review_verwijder['attributes']['artikels_id'];
			$actief = 1;

		$review_verwijder->actief = $actief;
	
	$review_verwijder->save();
	
		flash()->success('Uw review werd verwijderd.');
	
			return redirect('games/'.$artikel);
	}

	public function winkelmand()
	{
		$auth = Auth::user();
		$winkelmand = Winkelmand::where('winkelmands.user_id', '=', $auth['attributes']['id'])
								->where('winkelmands.actief', '=', 0)
								->join('artikels', 'artikel_id', '=', 'artikels.id_artikels')
								->join('consoles', 'console_id', '=', 'consoles.id_consoles')
								->get();
		$title = 'Winkelmand - Game Action';
		$console = console::get();
		$totaal = 0;
		foreach ($winkelmand as $prijzen ) 
		{
			$prijs = $prijzen['attributes']['prijs'];
			$totaal +=$prijs;
		}
		return view('pages.winkelmand', compact('title', 'console', 'winkelmand', 'totaal'));

	}

	public function toevoegen_winkelmand($id)
	{
		$artikel = $id;
		$user = Auth::user()->id;
		$actief = 0;

		$winkelmand = Winkelmand::where('winkelmands.user_id', '=', $user)
								->where('winkelmands.artikel_id', '=', $artikel)
								->where('winkelmands.actief', '=', 0)
								->join('artikels', 'artikel_id', '=', 'artikels.id_artikels')
								->join('consoles', 'console_id', '=', 'consoles.id_consoles')
								->get();
		if (count($winkelmand)) 
		{
			flash()->error('Het artikel staat al in uw winkelmand.');
			return redirect($_SERVER['HTTP_REFERER']);
		}

		else
		{
			$nieuwe_winkelmand = new Winkelmand;
			$nieuwe_winkelmand->artikel_id = $artikel;
			$nieuwe_winkelmand->user_id = $user;
			$nieuwe_winkelmand->aantal = 1;
			$nieuwe_winkelmand->actief = $actief;

			$nieuwe_winkelmand->save();

			flash()->success('Het artikel werd in uw winkelmand geplaatst.');
			return redirect($_SERVER['HTTP_REFERER']);
		}

	}

	public function verwijderen_winkelmand ($id)
	{
		$winkelmand_verwijder = Winkelmand::findOrFail($id);
			$winkelmand_verwijder->actief = 1;
			$winkelmand_verwijder->save();

		flash()->success('Het artikel werd uw de winkelmand verwijderd.');
		return redirect('winkelmand');
	}

	public function afrekenen()
	{
		$title = 'Afrekenen - Game Action';
		$console = console::get();
		return view('pages.afrekenen', compact('title', 'console'));

	}

}
