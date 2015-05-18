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

Route::get('admin-login', 'AdminController@admin_login');

Route::get('admin-consoles', 'AdminController@consoles');

Route::post('admin-consoles?{toevoegen}', 'AdminController@store');

Route::get('admin-consoles?edit', 'AdminController@edit');


