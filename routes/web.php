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

Route::get('/', function (SammyK\LaravelFacebookSdk\LaravelFacebookSdk $fb) {
    if (!session_id()) {
        session_start();
    }

    // Send an array of permissions to request
    $login_url = $fb->getLoginUrl(['email','user_photos']);

    return view('welcome', ['login' => $login_url]);
});

Route::get('/indexBack', function () {
    $photos = Photo::all();
    return view('back/index', ['photos' => $photos]);
})->name('indexBack');

Route::get('/parameters', function () {

    return view('back/parameters');
});

//Faut lui donner les parametres
Route::post('/back', 'ParametersController@create');

//callback method to get facebook user infos
Route::get('/facebook/callback', 'ParametersController@index')->name('landing');
