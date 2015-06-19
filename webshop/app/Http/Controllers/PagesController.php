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
use App\Http\Requests\contactrequest;
use Request;
use App\User;
use App\Winkelmand;
use App\Factuur;
use App\FactuurDetails;

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
			
		$title =  $consoles->console .' games- Game Action';

		if (isset($_GET['genre'])) {
			$artikels = Artikels::where('artikels.console_id', '=', $id)
								->where('artikels.actief', '=', 0)
								->where('artikels.genre_id','=', $_GET['genre'])
								->where('artikels.actief', '=', 0)
								->join('consoles', 'console_id', '=', 'consoles.id_consoles')
								->join('ontwikkelaars', 'ontwikkelaars_id', '=', 'ontwikkelaars.id_ontwikkelaars')
								->join('genres', 'genre_id', '=', 'genres.id_genres')
								->paginate(12);
		}

		else
		{
			$artikels = Artikels::where('artikels.console_id', '=', $id)
								->where('artikels.actief', '=', 0)
								->where('artikels.actief', '=', 0)
								->join('consoles', 'console_id', '=', 'consoles.id_consoles')
								->join('ontwikkelaars', 'ontwikkelaars_id', '=', 'ontwikkelaars.id_ontwikkelaars')
								->join('genres', 'genre_id', '=', 'genres.id_genres')
								->paginate(12);
		}
		
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
		$auth = Auth::user()->id;
		$title = 'Dashboard - Game Action';
		$console = console::get();
		$bestelling = Factuur::where('factuurs.user_id', '=', $auth)
								->join('statuses', 'factuurs.status', '=', 'statuses.id_status')
								->orderBy('factuurs.created_at', 'desc')
								->take(5)
								->get();
		return view('pages.dashboard', compact('title','console', 'bestelling'));
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

	public function bestelling_show($id)
	{
		$auth = Auth::user()->id;
		$title = 'Bestelling '. $id. ' - Game Action';
		$console = console::get();
		
		$bestelling = Factuur::where('factuurs.user_id', '=', $auth)
								->where('factuurs.id_factuur', '=', $id)
								->join('statuses', 'factuurs.status', '=', 'statuses.id_status')
								->get();
		$details = FactuurDetails::where('factuur_id', '=', $id)
									->join('artikels', 'product_id', '=', 'artikels.id_artikels')
									->join('consoles', 'console_id', '=', 'consoles.id_consoles')
									->get();

		return view('pages.bestelling_details', compact('title','console', 'bestelling', 'id', 'details'));
	}

	public function bestellingen()
	{
		$auth = Auth::user()->id;
		$title = 'Bestellingen - Game Action';
		$console = console::get();
		$bestelling = Factuur::where('factuurs.user_id', '=', $auth)
								->join('statuses', 'factuurs.status', '=', 'statuses.id_status')
								->orderBy('factuurs.created_at', 'desc')
								->get();
	
		return view('pages.bestellingen', compact('title','console', 'bestelling'));
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
			$totaal_prijzen = $prijzen['attributes']['prijs'] * $prijzen['attributes']['aantal_in_winkelmand'];;
			$totaal +=$totaal_prijzen;
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
			$nieuwe_winkelmand->aantal_in_winkelmand = 1;
			$nieuwe_winkelmand->actief = $actief;

			$nieuwe_winkelmand->save();

			flash()->success("Het artikel werd in uw winkelmand geplaatst.");
			return redirect($_SERVER['HTTP_REFERER']);
		}

	}

	public function update_winkelmand()
	{
		$input = request::all();

		$id = $input['id'];
		$aantal = $input['aantal'];

		$winkelmand =  Winkelmand::findOrFail($id);
		
		$artikel_id = $winkelmand['attributes']['artikel_id'];
		$artikel = Artikels::findOrFail($artikel_id);
		$artikel_aantal = $artikel['attributes']['aantal'];
		if ($aantal > $artikel_aantal) 
		{
			flash()->error('Kies een kleiner aantal. Er zijn niet genoeg games meer in voorraad.');
			return redirect('winkelmand');
		}

		else
		{
			if ($aantal < 1) 
			{
				$winkelmand_update = Winkelmand::findOrFail($id);
				$winkelmand_update->actief = 1;
	
				$winkelmand_update->save();	
				
				
			}
	
			else
			{
				$winkelmand_update = Winkelmand::findOrFail($id);
				$winkelmand_update->aantal_in_winkelmand = $aantal;
	
				$winkelmand_update->save();	
			}

			flash()->success('Uw winkelmand werd gewijzigd.');
			return redirect('winkelmand');
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
		$auth = Auth::user()->id;
		$winkelmand = Winkelmand::where('winkelmands.user_id', '=', $auth)
								->where('winkelmands.actief', '=', 0)
								->join('artikels', 'artikel_id', '=', 'artikels.id_artikels')
								->join('consoles', 'console_id', '=', 'consoles.id_consoles')
								->get();
		$user = User::where('actief', '=', 0)
						->where('id', '=', $auth)
						->get();
		$totaal = 0;

			foreach ($winkelmand as $prijzen ) 
			{
				$totaal_prijzen = $prijzen['attributes']['prijs'] * $prijzen['attributes']['aantal_in_winkelmand'];
				$totaal +=$totaal_prijzen;
			}
							
			
			if (!count($winkelmand)) 
			{
				return redirect('winkelmand');
			}
	
			else
			{
				return view('pages.afrekenen', compact('title', 'console', 'user', 'winkelmand', 'totaal'));
			}
	}

	public function afrekenen_post()
	{
		$input = request::all();
		$auth = Auth::user()->id;

		$winkelmand = Winkelmand::where('winkelmands.user_id', '=', $auth)
								->where('winkelmands.actief', '=', 0)
								->join('artikels', 'artikel_id', '=', 'artikels.id_artikels')
								->join('consoles', 'console_id', '=', 'consoles.id_consoles')
								->get();

		$user = User::where('actief', '=', 0)
						->where('id', '=', $auth)
						->get();

		$totaal = 0;
		foreach ($winkelmand as $prijzen ) 
		{
			$totaal_prijzen = $prijzen['attributes']['prijs'] * $prijzen['attributes']['aantal_in_winkelmand'];
			$totaal +=$totaal_prijzen;
		}

		$naam =$input["familienaam"] . ' ' . $input['voornaam'];
		$adres = $input['adres'];
		$bus = $input['bus'];
		$postcode = $input['postcode'];
		$gemeente = $input['gemeente'];
		$land = $input['land'];
		$prijs = $totaal;
		$status = 1;
		$date = date('Y-m-d');
		$nieuwe_factuur = new Factuur;
			$nieuwe_factuur->user_id = $auth;
			$nieuwe_factuur->verzend_naam = $naam;
			$nieuwe_factuur->adres = $adres;
			$nieuwe_factuur->bus = $bus;
			$nieuwe_factuur->postcode = $postcode;
			$nieuwe_factuur->gemeente = $gemeente;
			$nieuwe_factuur->prijs = $prijs;
			$nieuwe_factuur->status = $status;
			$nieuwe_factuur->land = $land;
			$nieuwe_factuur->datum = $date;
			$nieuwe_factuur->save();

		$insert_id = $nieuwe_factuur->id_factuur;

		foreach ($winkelmand as $value) 
		{
			$nieuwe_factuurDetails = new FactuurDetails;
				$nieuwe_factuurDetails->factuur_id = $insert_id;
				$nieuwe_factuurDetails->product_id =  $value['attributes']['artikel_id'];
				$nieuwe_factuurDetails->aantal_in_details = $value['attributes']['aantal_in_winkelmand'];

				$nieuwe_factuurDetails->save();

			$id_artikel = $value->id_artikels;

			$min = $value->aantal - $value->aantal_in_winkelmand;

			$update_artikel = Artikels::findOrFail($id_artikel);
				$update_artikel->aantal = $min;
				$update_artikel->save();
		}

		$winkelmand_verwijder = Winkelmand::where('winkelmands.user_id', '=', $auth)
										->where('winkelmands.actief', '=', 0)
										->get();

		foreach ($winkelmand_verwijder as $winkelmand_verwijder) 
		{
						$winkelmand_verwijder->actief = 1;
						$winkelmand_verwijder->save();
		}
		



		flash()->success('Uw bestelling werd geplaatst.');
		return redirect('dashboard');
	}

	public function contact()
	{
		$title = 'Bestellingen - Game Action';
		$console = console::get();
		$auth = Auth::user();

		return view('pages.contact', compact('title', 'console', 'auth'));
	}

	public function post_contact(contactrequest $Request)
	{
		$input = request::all();
		$mailto = 'glenlauwers@hotmail.com';
		$onderwerp = 'Bericht van contact';
		$bericht = $input['bericht'];
		$header= "U kreeg een bericht van". $input['voornaam']. " ". $input['familienaam']. " (" .$input['email'].").";

		mail($mailto, $onderwerp, $bericht, $header);

		flash()->success('Uw bericht werd verstuurd. We proberen zo snel mogelijk een antwoord te versturen.');
		return redirect('contact');
	}

	public function voorwaarden()
	{
		$title = 'Bestellingen - Game Action';
		$console = console::get();

		return view('pages.voorwaarden', compact('title', 'console'));

	}
}
