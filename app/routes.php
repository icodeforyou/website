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

Route::get('/', function () {
    return View::make('index');
});

Route::get("tjanster", function () {
    return View::make("tjanster");
});

Route::get("kontakt", function () {
    return View::make("kontakt");
});

Route::post("kontakt", ["uses" => "BaseController@Contact"]);

Route::get("digital/{action}/{method}/{value?}", ["uses" => "DigitalOceanController@index"]);

Route::group(["prefix" => "__spa/v1"], function () {
    Route::get("{page}", "SpaController@RenderPage");
});

Route::get("instagram/{userId?}", "InstagramController@index");
Route::get("instagramcode", "InstagramController@store");

Route::get("locale/{locale}", function ($locale) {

    // Store the locale in session
    Session::put("locale", $locale);
    App::setLocale($locale);
    return Redirect::back();

});

Route::post("fibertillsloinge", "BaseController@fiberProxy");
Route::get("fibertillsloinge/intressenter", function () {
    return Response::json(Entry::all(), 200, ['Access-Control-Allow-Origin' => '*']);
});