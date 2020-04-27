<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// $pdf = App::make('dompdf.wrapper');
// $pdf->loadHTML('<h1>Test</h1>');
// return $pdf->download();
Route::get('/', function () {
    return view('login');
});

Route::get('/principal','VistasController@principal')->name('principal');
Route::get('/principa1','VistasController@principa1')->name('principa1');
Route::get('/Index','VistasController@Index')->name('Index');
// L O G I N 
Route::get('login','loginController@login')->name('login');
Route::post('iniciasesion','loginController@iniciasesion')->name('iniciasesion');
Route::get('cerrarsesion','loginController@cerrarsesion')->name('cerrarsesion');
// V A L E S 
Route::POST('Gvales','ValesController@Gvales')->name('Gvales');
Route::get('comprobacion','ValesController@comprobacion')->name('comprobacion');


// Route::get('/', 'DataController@index');
// Route::get('downloadData/{type}', 'DataController@downloadData');
// Route::post('importData', 'DataController@importData');
