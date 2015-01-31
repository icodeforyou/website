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
    return Response::json(Entry::Visible()->get(), 200, ['Access-Control-Allow-Origin' => '*']);
});

Route::get("fibertillsloinge/allaintresserade", function() {

    $entries = Entry::Visible()->get();

    Excel::create("fiber-oktorp-alla.xls", function($excel) use($entries) {

        $excel->sheet("Intresserade", function($sheet) use($entries) {

            $sheet->fromModel($entries);

        });

    })->export("xls");


/*
    $output = "";
    foreach ($entries as $row) {
        $output .= implode(";",$row->toArray());
    }

    $headers = array(
        'Content-Type' => 'text/csv',
        'Content-Disposition' => 'attachment; filename="ExportFileName.csv"',
    );

    return Response::make($output, 200, $headers);

*/
});