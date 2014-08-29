<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

Route::get('/', function()
{
	return View::make('index');
});

Route::get("tjanster", function() {
    return View::make("tjanster");
});

Route::get("kontakt", function() {
    return View::make("kontakt");
});

Route::post("kontakt", ["uses" => "BaseController@Contact"]);

Route::get("digital/{action}/{method}/{value?}", ["uses" => "DigitalOceanController@index"]);