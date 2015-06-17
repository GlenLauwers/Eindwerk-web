<?php namespace App\Http\Controllers\admin;

use App\console;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Request;
use Auth;


class AdminConsolesController extends Controller {

	public function toevoegen()
	{
		if (Auth::user()->type != 'admin') 
		{
			return redirect('/');
		}
		
		else
		{
			$title = ('Console toevoegen - Admin');
			return view('admin.consoles.toevoegen', compact('title'));
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
				$nieuwe_console = $input['console'];
				$actief = 0;
			
			$console = console::where('actief', '=', 0)->where('console', '=', $nieuwe_console)->get();
	
			if (isset($console[0])) 
			{
				flash()->error('De console "' . $nieuwe_console . '" staat al in de database.');
				return redirect('admin-consoles/toevoegen');
			}
	
			else
			{
				$console = new console;
					$console->console = $nieuwe_console;
					$console->actief = $actief;
					$console->save();
		
				flash()->success('De console "' . $nieuwe_console . '" is toegevoegd.');
		
				return redirect('admin-consoles');
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
			$title = ('Console wijzigen - Admin');
			$console_wijzigen = console::findOrFail($id);

			return view('admin.consoles.edit', compact('title', 'console_wijzigen'));
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
			$input = $input['console'];
			$console = console::where('actief', '=', 0)->where('console', '=', $input)->get();
	
			if (isset($console[0])) 
			{
				flash()->error('De console "' . $input . '" staat al in de database.');
				return redirect('admin-consoles/edit/'.$id);
			}
	
			else
			{
				$console_update = console::findOrFail($id);
				$console_update->console = $input;
				$console_update->save();
				
				flash()->success('De console "' . $input . '" werd gewijzigd.');
				return redirect('admin-consoles');
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
			$title = ('Console - Admin');
			$verwijder = true;
			$consoles = console::where('actief', '=', 0)->get();
			$console_verwijder = console::findOrFail($id);

			return view('admin.consoles.consoles', compact('title', 'verwijder', 'consoles', 'console_verwijder'));
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
			$console_verwijder = console::findOrFail($id);
	
			$actief = 1;
	
			$console_verwijder->actief = $actief;
	
			$console_verwijder->save();
	
			flash()->success('De console "' . $console_verwijder['console'] . '" werd verwijderd.');
	
			return redirect('admin-consoles');
		}
	}
}
