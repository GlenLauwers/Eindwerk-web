<?php namespace App\Http\Controllers\admin;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\console;
use App\User;
use App\genres;
use App\ontwikkelaars;
use App\Artikels;
use App\Factuur;
use Request;
use Auth;
use App\FactuurDetails;

class AdminBestellingenController extends Controller {
	public function niet_betaald ($id)
	{
		$factuur = Factuur::findOrFail($id);
			$factuur->status = 1;
			$factuur->save();

		flash()->success("Uw artikel werd verplaatst naar 'Niet betaald'.'");
		return redirect('admin-bestellingen');
	}

	public function betaald ($id)
	{
		$factuur = Factuur::findOrFail($id);
			$factuur->status = 2;
			$factuur->save();

		flash()->success("Uw artikel werd verplaatst naar 'Betaald'.'");
		return redirect('admin-bestellingen');
	}

	public function verzonden ($id)
	{
		$factuur = Factuur::findOrFail($id);
			$factuur->status = 3;
			$factuur->save();

		flash()->success("Uw artikel werd verplaatst naar 'Verzonden'.'");
		return redirect('admin-bestellingen');
	}

	public function bezorgd ($id)
	{
		$factuur = Factuur::findOrFail($id);
			$factuur->status = 4;
			$factuur->save();

				flash()->success("Uw artikel werd verplaatst naar 'betaald'.'");
		return redirect('admin-bestellingen');
	}

	public function bestelling ($id)
	{
		$bestelling = Factuur::where('factuurs.id_factuur', '=', $id)
								->join('statuses', 'factuurs.status', '=', 'statuses.id_status')
								->join('users', 'user_id', '=', 'users.id')
								->get();
		$details = FactuurDetails::where('factuur_id', '=', $id)
									->join('artikels', 'product_id', '=', 'artikels.id_artikels')
									->join('consoles', 'console_id', '=', 'consoles.id_consoles')
									->get();

		$title = 'Bestelling '. $id. ' - Admin';

		return view('admin.bestellingen.show', compact('title', 'details', 'bestelling', 'id')); 
	}
}