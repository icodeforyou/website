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

    $intressenter = [
        [
            "name"    => "Fam. Thorstedt",
            "address" => "Oktorp 107, 311 67 Slöinge"
        ],
        [
            "name"    => "Fam. Albrektsson",
            "address" => "Trastgatan 3, 311 68 Slöinge"
        ],
        [
            "name"    => "Fam. Sönnerstedt",
            "address" => "Almgatan 6, 311 68 Slöinge"
        ],
        [
            "name"    => "Dennis Johansson",
            "email"   => "dempa74@icloud.com",
            "address" => "Trastgatan 2a, 311 68 Slöinge"
        ],
        [
            "name"    => "Anne-Sofie Yngerlöv",
            "name2"   => "Mårten Reisne",
            "email"   => "a_yngerlov@hotmail.com",
            "address" => "Stationsgatan 9, 311 68 Slöinge"
        ],
        [
            "name"    => "Christer Jörmalm",
            "email"   => "cjormalm@gmail.com",
            "address" => "Trädgårdsgatan 5, 311 68 Slöinge"
        ],
        [
            "name"    => "Peter Persson",
            "email"   => "petepers@bredband.net",
            "address" => "Bertevägen 7, 311 67 Slöinge"
        ],
        [
            "name"    => "Niclas Johansson",
            "email"   => "krabbfiskaren@hotmail.com",
            "address" => "Ågatan 3, 311 68 Slöinge"
        ],
        [
            "name"    => "Fredrik Norén",
            "email"   => "vallagurun@telia.com",
            "address" => "Rosgatan 4, 311 67 Slöinge"
        ],
        [
            "name"    => "Thorvald Persson",
            "name2"   => "Ingrid Persson",
            "email"   => "thorvald.persson@telia.com",
            "address" => "Yttregårdsvägen 8, 311 06 Heberg"
        ],
        [
            "name"    => "Patric Brundin",
            "name2"   => "Anneli Brundin",
            "email"   => "40208@telia.com",
            "address" => "Bäckagårdsvägen 6, 311 68 Slöinge"
        ],
        [
            "name"    => "Stig Svensson",
            "email"   => "5716svensson@telia.com",
            "address" => "Stenlösvägen 6, 311 68 Slöinge"
        ]
    ];


    return Response::json(Entry::all(), 200, ['Access-Control-Allow-Origin' => '*']);
});