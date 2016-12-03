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

Route::get('/', function () {
  $lampada = \App\Lampada::all();
return view('controle.redeletrica-1') ->with('lampada', $lampada);
});
Route::resource('home', 'ControleLampadaController');
