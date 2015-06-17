<?php namespace App\Http\Controllers\admin;

use App\ontwikkelaars;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Request;
use Auth;

class AdminOntwikkelaarsController extends Controller {

	public function toevoegen()
	{
		if (Auth::user()->type != 'admin') 
		{
			return redirect('/');
		}
		
		else
		{
			$title = ('Ontwikkelaar toevoegen - Admin');
			return view('admin.ontwikkelaars.toevoegen', compact('title'));
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
				$nieuwe_ontwikkelaar = $input['ontwikkelaars'];
				$actief = 0;
	
			$ontwikkelaar = ontwikkelaars::where('actief', '=', 0)->where('ontwikkelaars', '=', $nieuwe_ontwikkelaar)->get();
	
			if (isset($ontwikkelaar[0])) 
			{
				flash()->error('De  ontwikkelaar "' . $nieuwe_ontwikkelaar . '" staat al in de database.');
				return redirect('admin-ontwikkelaars/toevoegen');
			}
	
			else
			{
				$ontwikkelaar = new ontwikkelaars;
					$ontwikkelaar->ontwikkelaars = $nieuwe_ontwikkelaar;
					$ontwikkelaar->actief = $actief;
					$ontwikkelaar->save();
		
				flash()->success('De ontwikkelaar "' . $nieuwe_ontwikkelaar . '" is toegevoegd.');
		
				return redirect('admin-ontwikkelaars');
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
			$title = ('Ontwikkelaar wijzigen - Admin');
			$ontwikkelaars_wijzigen = ontwikkelaars::findOrFail($id);

			return view('admin.ontwikkelaars.edit', compact('title', 'ontwikkelaars_wijzigen'));
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
			$input = $input['ontwikkelaars'];
			$ontwikkelaar = ontwikkelaars::where('actief', '=', 0)->where('ontwikkelaars', '=', $input)->get();
	
			if (isset($ontwikkelaar[0])) 
			{
				flash()->error('De ontwikkelaar "' . $input . '" staat al in de database.');
				return redirect('admin-ontwikkelaars/edit/'.$id);
			}
	
			else
			{
				$ontwikkelaar_update = ontwikkelaars::findOrFail($id);
				$ontwikkelaar_update->ontwikkelaars = $input;
				$ontwikkelaar_update->save();
				
				flash()->success('De ontwikkelaar "' . $input . '" werd gewijzigd.');
				return redirect('admin-ontwikkelaars');
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
			$title = ('Ontwikkelaars - Admin');
			$verwijder = true;
			$ontwikkelaars = ontwikkelaars::where('actief', '=', 0)->get();
			$ontwikkelaars_verwijder = ontwikkelaars::findOrFail($id);
	
			return view('admin.ontwikkelaars.ontwikkelaars', compact('title', 'verwijder', 'ontwikkelaars', 'ontwikkelaars_verwijder'));
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
			$ontwikkelaars_verwijder = ontwikkelaars::findOrFail($id);
	
			$actief = 1;
	
			$ontwikkelaars_verwijder->actief = $actief;
	
			$ontwikkelaars_verwijder->save();
	
			flash()->success('De ontwikkelaar "' . $ontwikkelaars_verwijder['ontwikkelaars'] . '" werd verwijderd.');
	
			return redirect('admin-ontwikkelaars');
		}
	}
}
