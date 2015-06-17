<?php namespace App\Http\Controllers\admin;

use App\genres;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Request;
use Auth;

class AdminGenresController extends Controller {

	public function toevoegen()
	{
		if (Auth::user()->type != 'admin') 
		{
			return redirect('/');
		}
		
		else
		{
			$title = ('Genre toevoegen - Admin');
			return view('admin.genres.toevoegen', compact('title'));
		}
	}
	
	public function store()
	{
		if (Auth::user()->type != 'admin') 
		{
			return redirect('/');
		}
		
		else
		{
			$input = request::all();
				$nieuw_genre = $input['genres'];
				$actief = 0;
	
			$genre = genres::where('actief', '=', 0)->where('genres', '=', $nieuw_genre)->get();
	
			if (isset($genre[0])) 
			{
				flash()->error('Het genre "' . $nieuw_genre . '" staat al in de database.');
				return redirect('admin-genres/toevoegen');
			}
	
			else
			{
				$genre = new genres;
					$genre->genres = $nieuw_genre;
					$genre->actief = $actief;
					$genre->save();
		
				flash()->success('Het genre "' . $nieuw_genre . '" is toegevoegd.');
		
				return redirect('admin-genres');
			}
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
			$title = ('Genre wijzigen - Admin');
			$genres_wijzigen = genres::findOrFail($id);

			return view('admin.genres.edit', compact('title', 'genres_wijzigen'));
		}
	}

	public function update($id)
	{
		if (Auth::user()->type != 'admin') 
		{
			return redirect('/');
		}
		
		else
		{
			$input = request::all();
			$input = $input['genres'];
			$genre = genres::where('actief', '=', 0)->where('genres', '=', $input)->get();
	
			if (isset($genre[0])) 
			{
				flash()->error('Het genre "' . $input . '" staat al in de database.');
				return redirect('admin-genres/edit/'.$id);
			}
	
			else
			{
				$genre_update = genres::findOrFail($id);
				$genre_update->genres = $input;
				$genre_update->save();
				
				flash()->success('Het genre "' . $input . '" werd gewijzigd.');
				return redirect('admin-genres');
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
			$title = ('Genres - Admin');
			$verwijder = true;
			$genres = genres::where('actief', '=', 0)->get();
			$genres_verwijder = genres::findOrFail($id);
	
			return view('admin.genres.genres', compact('title', 'verwijder', 'genres', 'genres_verwijder'));
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
			$genres_verwijder = genres::findOrFail($id);
	
			$actief = 1;
	
			$genres_verwijder->actief = $actief;
	
			$genres_verwijder->save();
	
			flash()->success('Het genre "' . $genres_verwijder['genres'] . '" werd verwijderd.');
	
			return redirect('admin-genres');
		}
	}
}
