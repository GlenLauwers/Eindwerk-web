<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

/*
|--------------------------------------------------------------------------
| Admin
|--------------------------------------------------------------------------
*/

//Login


Route::get('admin', 'admin\AdminController@login');

Route::post('admin', 'admin\AdminController@login_checker');

Route::get('admin-logout', 'admin\AdminController@logout');


//Pagina's 

Route::group([
  'middleware' => 'auth',
], function () {

Route::get('admin-home', 'admin\AdminController@home');

Route::get('admin-consoles', 'admin\AdminController@consoles');

Route::get('admin-genres', 'admin\AdminController@genres');

Route::get('admin-ontwikkelaars', 'admin\AdminController@ontwikkelaars');

Route::get('admin-artikels', 'admin\AdminController@artikels');

Route::get('admin-bestellingen', 'admin\AdminController@bestellingen');

//Consoles

Route::get('admin-consoles/toevoegen', 'admin\AdminConsolesController@toevoegen');

Route::post('admin-consoles/toevoegen', 'admin\AdminConsolesController@store');

Route::get('admin-consoles/edit/{id}', 'admin\AdminConsolesController@edit');

Route::post('admin-consoles/edit/{id}', 'admin\AdminConsolesController@update');

Route::get('admin-consoles/delete/{id}', 'admin\AdminConsolesController@delete');

Route::get('admin-consoles/verwijder/{id}', 'admin\AdminConsolesController@delete_confirmed');


//Genres

Route::get('admin-genres/toevoegen', 'admin\AdminGenresController@toevoegen');

Route::post('admin-genres/toevoegen', 'admin\AdminGenresController@store');

Route::get('admin-genres/edit/{id}', 'admin\AdminGenresController@edit');

Route::post('admin-genres/edit/{id}', 'admin\AdminGenresController@update');

Route::get('admin-genres/delete/{id}', 'admin\AdminGenresController@delete');

Route::get('admin-genres/verwijder/{id}', 'admin\AdminGenresController@delete_confirmed');


//Ontwikkelaars

Route::get('admin-ontwikkelaars/toevoegen', 'admin\AdminOntwikkelaarsController@toevoegen');

Route::post('admin-ontwikkelaars/toevoegen', 'admin\AdminOntwikkelaarsController@store');

Route::get('admin-ontwikkelaars/edit/{id}', 'admin\AdminOntwikkelaarsController@edit');

Route::post('admin-ontwikkelaars/edit/{id}', 'admin\AdminOntwikkelaarsController@update');

Route::get('admin-ontwikkelaars/delete/{id}', 'admin\AdminOntwikkelaarsController@delete');

Route::get('admin-ontwikkelaars/verwijder/{id}', 'admin\AdminOntwikkelaarsController@delete_confirmed');


//Artikels

Route::get('admin-artikels/toevoegen', 'admin\AdminArtikelsController@toevoegen');

Route::post('admin-artikels/toevoegen', 'admin\AdminArtikelsController@store');

Route::get('admin-artikels/{id}', 'admin\AdminArtikelsController@show');

Route::get('admin-artikels/edit/{id}', 'admin\AdminArtikelsController@edit');

Route::post('admin-artikels/edit/{id}', 'admin\AdminArtikelsController@update');

Route::get('admin-artikels/delete/{id}', 'admin\AdminArtikelsController@delete');

Route::get('admin-artikels/verwijder/{id}', 'admin\AdminArtikelsController@delete_confirmed');

//Filter

Route::post('admin-artikels/filter', 'admin\AdminArtikelsController@filter');

//Screenshots

Route::get('admin-artikels/screenshots/{id}', 'admin\AdminArtikelsController@screenshots');

Route::get('admin-artikels/screenshots/toevoegen/{id}', 'admin\AdminArtikelsController@screenshots_toevoegen');

Route::post('admin-artikels/screenshots/toevoegen/{id}', 'admin\AdminArtikelsController@screenshots_add');

Route::get('admin-artikels/screenshots/delete/{id}', 'admin\AdminArtikelsController@screenshots_delete');

Route::get('admin-artikels/screenshots/verwijder/{id}', 'admin\AdminArtikelsController@screenshots_delete_confirmed');

//Bestellingen

Route::get('admin-bestellingen/niet_betaald/{id}', 'admin\adminBestellingenController@niet_betaald');

Route::get('admin-bestellingen/betaald/{id}', 'admin\adminBestellingenController@betaald');

Route::get('admin-bestellingen/verzonden/{id}', 'admin\adminBestellingenController@verzonden');

Route::get('admin-bestellingen/bezorgd/{id}', 'admin\adminBestellingenController@bezorgd');

Route::get('admin-bestellingen/{id}', 'admin\adminBestellingenController@bestelling');
});
/*
|--------------------------------------------------------------------------
| Site
|--------------------------------------------------------------------------
*/

//Home
Route::get('home', 'PagesController@home');

Route::get('/', 'PagesController@home');

//Consoles

Route::get('console/{id}', 'PagesController@console');

//Artikels

Route::get('games/{id}', 'PagesController@games');

//Reviews

Route::post('games/{id}', 'PagesController@review');

Route::get('games/review/delete/{id}', 'PagesController@delete_review');

//Artikels zoeken
Route::get('search', 'PagesController@zoeken');

Route::post('search', 'PagesController@search');

//over ons
Route::get('over-ons', 'PagesController@over_ons');

//Contact

Route::get('contact', 'PagesController@contact');

Route::post('contact', 'PagesController@post_contact');

//Voorwaarden

Route::get('voorwaarden', 'PagesController@voorwaarden');

//Login
Route::get('login', 'PagesController@login');

Route::post('login', 'PagesRegisterController@login');

Route::get('register', 'PagesController@register');

Route::post('register', 'PagesRegisterController@register');

Route::get('logout', 'PagesRegisterController@logout');

Route::group([
  'middleware' => 'auth',
], function () {
//Dashboard
Route::get('dashboard', 'PagesController@dashboard');

Route::get('dashboard/edit/{id}', 'PagesController@dashboard_wijzigen');

Route::post('dashboard/edit/{id}', 'PagesController@dashboard_wijzigen_confirmed');

Route::get('bestelling/{id}', 'PagesController@bestelling_show');

Route::get('bestellingen', 'PagesController@bestellingen');

//Winkelmand
Route::get('winkelmand', 'PagesController@winkelmand');

Route::post('winkelmand/update', 'PagesController@update_winkelmand');

Route::get('winkelmand/{id}', 'PagesController@toevoegen_winkelmand');

Route::get('winkelmand/delete/{id}', 'PagesController@verwijderen_winkelmand');

//Afrekenen
Route::get('afrekenen', 'PagesController@afrekenen');

Route::post('afrekenen', 'PagesController@afrekenen_post');

});






