<?php namespace App\Http\Controllers;

use App\console;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Http\Requests\CreateConsoleRequest;
use Request;

class AdminController extends Controller {


	/*
		Login menu van de admin-pagina
	*/
	public function admin_login()
	{
		$title = ('Login - Admin');
		return view('admin.login', compact('title'));
	}

	/*
		Pagina van de consoles
		Functies:
			console:Title van de pagina's en alle consoles uit de database halen.
			nieuw: Nieuwe console toevoegen. 
	*/

	public function consoles()
	{
		$title = ('Consoles - Admin');
		$console = console::all();

		return view('admin.consoles', compact('title', 'console'));
	}

	public function store(CreateConsoleRequest $request)
	{
		$input = Request::all();

		console::create($input);
		return redirect('admin-consoles');
	}

	public function edit($id , CreateConsoleRequest $request)
	{
		$console = console::findOrFail($id);
		$console->update($request->all());

		return redirect('admin-consoles', compact('console'));
	}



}
