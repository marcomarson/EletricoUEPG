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

// Route::get('/', function () {
//   $luminaria = \App\Luminaria::all();
// return view('controle.rede1') ->with('luminaria', $luminaria);
// });


Route::get('estudo', function () {
return view('estudo');
});


Route::resource('/', 'MainController');
Route::resource('atualiza', 'MainController');
Route::resource('home', 'ControleluminariaController');
Route::resource('petala', 'PetalaController');
Route::resource('poste', 'PosteController');
Route::resource('luminaria', 'LuminariaController');
Route::resource('relatorios', 'RelatoriosController');
