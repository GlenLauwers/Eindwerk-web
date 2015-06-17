<?php namespace App\Http\Controllers\admin;

use App\Artikels;
use App\genres;
use App\console;
use App\Screenshots;
use App\ontwikkelaars;
use App\Http\Requests\ArtikelRequest;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Request;
use Auth;

class AdminArtikelsController extends Controller {

	public function toevoegen()
	{
		if (Auth::user()->type != 'admin') 
		{
			return redirect('/');
		}
		
		else
		{
			$title = ('Artikel toevoegen - Admin');
			$genres = genres::where('actief', '=', 0)->get();
			$consoles = console::where('actief', '=', 0)->get();
			$ontwikkelaars = ontwikkelaars::where('actief', '=', 0)->get();
			return view('admin.artikels.toevoegen', compact('title', 'genres', 'consoles', 'ontwikkelaars'));
		}
	}

	public function store(ArtikelRequest $request)
	{
		if (Auth::user()->type != 'admin') 
		{
			return redirect('/');
		}
		
		else
		{
			$input = request::all();
			$naam = $input['naam'];
			$prijs = $input['prijs'];
			$release_datum = $input['release_datum'];
			$trailer = $input['trailer'];
			$genre = $input['genre'];
			$console = $input['console'];
			$ontwikkelaar = $input['ontwikkelaar'];
			$beschrijving =  $input['beschrijving'];
			$aantal = $input['aantal'];

			if (!empty(request::file())) 
			{
				$cover = $input['cover'];
			}
			
			$actief = 0;

			
			$artikel = Artikels::where('actief', '=', 0)->where('naam', '=', $naam)->where('console_id', '=', $console)->get();
	
			if (isset($artikel[0])) 
			{
				flash()->error('Het artikel "' . $naam . '" staat al in de database.');
				return redirect('admin-artikels/toevoegen');
			}
	
			else
			{

				if ((empty($naam) || (empty($beschrijving)) ))
				{
					flash()->error('De verplichte velden zijn niet ingevuld. Probeer opnieuw');
					return redirect('admin-artikels/toevoegen');
				}

				else
				{
					$artikel = new Artikels;
						$artikel->naam = $naam;
						$artikel->prijs = $prijs;
						$artikel->release_datum = $release_datum;
						$artikel->trailer = $trailer;
						$artikel->genre_id = $genre;
						$artikel->console_id = $console;
						$artikel->ontwikkelaars_id = $ontwikkelaar;
						$artikel->beschrijving = $beschrijving;
						$artikel->actief = $actief;
						$artikel->aantal = $aantal;

					if (!empty(request::file())) 
					{
						if ($_FILES['cover']['type'] != 'image/jpeg')
						{
							flash()->error('Uw bestand heeft een verkeerde indeling.');
							return redirect('admin-artikels/edit/'.$id);
						}

						else
						{
							$random = rand().'_';
							$cover_naam = $random.$_FILES['cover']['name'];
							$target_path_cover = public_path().sprintf("/afbeeldingen/covers/");
							$upload = $cover->move($target_path_cover, $cover_naam );
							$artikel->cover = 'covers/' . $cover_naam;
						}
					}
												
					$artikel->save();
			
					flash()->success('Het artikel "' . $naam . '" werd toegevoegd.');
			
					return redirect('admin-artikels');
				}
			}
		}
	}

	public function show($id)
	{
		if (Auth::user()->type != 'admin') 
		{
			return redirect('/');
		}
		
		else
		{
			$Artikels = Artikels::findOrFail($id);

			$beschikbaar_op = Artikels::where('naam', '=', $Artikels['attributes']['naam'])->join('consoles', 'console_id', '=', 'consoles.id_consoles')->get();
			$title = $Artikels['attributes']['naam']; 
			$Artikels = Artikels::where('artikels.id_artikels', '=', $id)
								->join('consoles', 'console_id', '=', 'consoles.id_consoles')
								->join('ontwikkelaars', 'ontwikkelaars_id', '=', 'ontwikkelaars.id_ontwikkelaars')
								->join('genres', 'genre_id', '=', 'genres.id_genres')
								->get();
			$screenshots = Screenshots::where('artikels_id', '=', $id)->where('actief', '=', 0)->get();

			return view('admin.artikels.show', compact('Artikels', 'title', 'beschikbaar_op', 'screenshots'));
		}
	}

	public function edit($id)
	{
		if (Auth::user()->type != 'admin') 
		{
			return redirect('/');
		}
		
		else
		{
			$title = ('Artikel wijzigen - Admin');
			$artikel_wijzigen = Artikels::join('consoles', 'console_id', '=', 'consoles.id_consoles')
											->join('ontwikkelaars', 'ontwikkelaars_id', '=', 'ontwikkelaars.id_ontwikkelaars')
											->join('genres', 'genre_id', '=', 'genres.id_genres')->findOrFail($id);

			$genres = genres::where('actief', '=', 0)->get();
			$consoles = console::where('actief', '=', 0)->get();
			$ontwikkelaars = ontwikkelaars::where('actief', '=', 0)->get();
			return view('admin.artikels.edit', compact('title', 'artikel_wijzigen', 'genres', 'consoles', 'ontwikkelaars'));
		}
	}

	public function update($id, ArtikelRequest $request)
	{
		if (Auth::user()->type != 'admin') 
		{
			return redirect('/');
		}

		else
		{
			$input = request::all();
				$naam = $input['naam'];
				$prijs = $input['prijs'];
				$release_datum = $input['release_datum'];
				$trailer = $input['trailer'];
				$genre = $input['genre'];
				$console = $input['console'];
				$ontwikkelaar = $input['ontwikkelaar'];
				$beschrijving = $input['beschrijving'];
				$actief = 0;
				$aantal = $input['aantal'];
			
			if (!empty(request::file())) 
			{
				$cover = $input['cover'];
			}

			$beschrijving =  $input['beschrijving'];

			$artikel = Artikels::where('actief', '=', 0)->where('naam', '=', $naam)->where('console_id', '=', $console)->where('id_artikels', '!=', $id)->get();

			if (isset($artikel[0])) 
			{
				flash()->error('Het artikel "' . $naam . '" staat al in de database.');
				return redirect('admin-artikels/edit/'.$id);
			}

			else
			{			
				$artikel_update = Artikels::findOrFail($id);
				$artikel_update->naam = $naam;
				$artikel_update->prijs = $prijs;
				$artikel_update->release_datum = $release_datum;
				$artikel_update->trailer = $trailer;
				$artikel_update->genre_id = $genre;
				$artikel_update->console_id = $console;
				$artikel_update->ontwikkelaars_id = $ontwikkelaar;
				$artikel_update->beschrijving = $beschrijving;
				$artikel_update->aantal = $aantal;
	
				if (!empty(request::file())) 
				{
					if ($_FILES['cover']['type'] != 'image/jpeg')
					{
						flash()->error('Uw bestand heeft een verkeerde indeling.');
						return redirect('admin-artikels/edit/'.$id);
					}
					
					else
					{
						$random = rand().'_';
						$cover_naam = $random.$_FILES['cover']['name'];
						$target_path_cover = public_path().sprintf("/afbeeldingen/covers/");
						$upload = $cover->move($target_path_cover, $cover_naam );
						$artikel_update->cover = 'covers/' . $cover_naam;
					}
				}
	
				$artikel_update->save();
	
				flash()->success('Het artikel "' . $naam . '" werd gewijzigd.');
				return redirect('admin-artikels');
			}
		}
	}

	public function delete($id)
	{
		if (Auth::user()->type != 'admin') 
		{
			return redirect('/');
		}
		
		else
		{
			$title = ('Artikels - Admin');
			$verwijder = true;
			$artikels = Artikels::where('actief', '=', 0)->get();
			$Artikels_verwijder = Artikels::findOrFail($id);
	
			return view('admin.artikels.artikels', compact('title', 'verwijder', 'artikels', 'Artikels_verwijder'));
		}
	}

	public function delete_confirmed($id)
	{
		if (Auth::user()->type != 'admin') 
		{
			return redirect('/');
		}
		
		else
		{
			$Artikels_verwijder = Artikels::findOrFail($id);
	
			$actief = 1;
	
			$Artikels_verwijder->actief = $actief;
	
			$Artikels_verwijder->save();
	
			flash()->success('Het artikel "' . $Artikels_verwijder['naam'] . '" werd verwijderd.');
	
			return redirect('admin-artikels');
		}
	}

	public function screenshots($id)
	{
		if (Auth::user()->type != 'admin') 
		{
			return redirect('/');
		}
		else
		{
			$title = ('Screenshots - Admin');
			$artikels = Artikels::where('artikels.id_artikels', '=', $id)
								->join('consoles', 'console_id', '=', 'consoles.id_consoles')
								->get();
			$screenshots = Screenshots::where('artikels_id', '=', $id)->where('actief', '=', 0)->get();
			return view('admin.artikels.screenshot', compact('title', 'artikels', 'screenshots'));
		}
	}

	public function screenshots_toevoegen($id)
	{
		if (Auth::user()->type != 'admin') 
		{
			return redirect('/');
		}
		else
		{
			$title = ('Screenshots toevoegen - Admin');
			$artikels = Artikels::where('artikels.id_artikels', '=', $id)
								->join('consoles', 'console_id', '=', 'consoles.id_consoles')
								->get();
			return view('admin.artikels.screenshotsToevoegen', compact('title', 'artikels'));
		}
	}

	public function screenshots_add($id)
	{
		if (Auth::user()->type != 'admin') 
		{
			return redirect('/');
		}
		else
		{
			$input = request::file();
			$screenshots = $input['screenshot'];

			if (empty($input)) 
			{
				flash()->error('Er is geen screenshot toegevoegd.');
				return redirect('admin-artikels/screenshots/toevoegen/'.$id);
			}

			else
			{
				if ($_FILES['screenshot']['type'] != 'image/jpeg') 
				{
					flash()->error('Dit bestand is geen afbeelding.');
					return redirect('admin-artikels/screenshots/toevoegen/'.$id);
				}

				else
				{
					$random = rand().'_';
						$screenshot_naam = $random.$_FILES['screenshot']['name'];
						$target_path_cover = public_path().sprintf("/afbeeldingen/screenshots/");
						$upload = $screenshots->move($target_path_cover, $screenshot_naam );

						$screenshot = new Screenshots;
						$screenshot->screenshot = 'screenshots/' . $screenshot_naam;
						$screenshot->artikels_id = $id;
						$screenshot->actief = 0;

						$screenshot->save();
			
					flash()->success('De screenshot werd toegevoegd');
			
					return redirect('admin-artikels/screenshots/'.$id);

				}
			}
		}
	}

	public function screenshots_delete($id)
	{
		if (Auth::user()->type != 'admin') 
		{
			return redirect('/');
		}
		
		else
		{
			$screenshots_verwijder = Screenshots::findOrFail($id);
			$artikel_id = $screenshots_verwijder['attributes']['artikels_id'];

			$title = ('Artikels - Admin');
			$verwijder = true;
			
			$artikels = Artikels::where('artikels.id_artikels', '=', $artikel_id)
								->join('consoles', 'console_id', '=', 'consoles.id_consoles')
								->get();

			$screenshots = Screenshots::where('artikels_id', '=', $artikel_id)->where('actief', '=', 0)->get();

			$screenshots_verwijder = Screenshots::FindOrFail($id);

			return view('admin.artikels.screenshot', compact('title', 'verwijder', 'artikels', 'screenshots_verwijder', 'screenshots'));

	
		}
	}

	public function screenshots_delete_confirmed($id)
	{
		if (Auth::user()->type != 'admin') 
		{
			return redirect('/');
		}
		
		else
		{
			$screenshot_verwijder = Screenshots::findOrFail($id);
	
			$actief = 1;
	
			$artikels_id = $screenshot_verwijder['attributes']['artikels_id'];

			$screenshot_verwijder->actief = $actief;
	
			$screenshot_verwijder->save();
	
			flash()->success('De screenshot werd verwijderd.');
	
			return redirect('admin-artikels/screenshots/'.$artikels_id);
		}
	}

	public function filter()
	{
		if (Auth::user()->type != 'admin') 
		{
			return redirect('/');
		}
		
		else
		{
			$input = request::all();
			$zoeken = $input['zoeken'];
			$artikel_zoeken = true;

			$title = ('Artikels - Admin');
			$artikels = Artikels::where('artikels.naam', 'LIKE', '%'.$zoeken.'%')->join('consoles', 'consoles.id_consoles', '=', 'artikels.console_id')->get();
			return view('admin.artikels.artikels', compact('title', 'artikels', 'artikel_zoeken'));
		}
	}
}