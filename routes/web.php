<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', 'HomeController@index')->name('home');

// Genera tutte le rotte per la gestione dell'autenticazione
Auth::routes();

//Rotta pagina ricerca appartamenti con filtri
Route::post('/flats/find', 'FlatController@find')->name('flat.find');

// Rotta pagina di dettaglio di un Appartamento
Route::get('/flats/details/{id}', 'HomeController@detailsFlat')->name('flat.details');

// Specifichiamo un gruppo di route che condividono una serie di comandi,  come per esempio il fatto che possono essere visualizzati solo sesi è loggati
Route::middleware('auth')->prefix('upr')->namespace('Upr')->name('upr.')->group(function() {
    Route::get('/', 'HomeController@index')->name('home');
    Route::resource("/flats" , "FlatController");
});
