<?php
use App\Photo;
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
    $login_url = $fb->getLoginUrl(['email','user_photos', 'publish_actions']);

    return view('welcome', ['login' => $login_url]);
});

Route::get('/login', 'Auth\LoginController@authenticate')->name('login');
Route::get('/logout', 'LoginController@logout');

Route::get('/indexBack', 'ParametersController@indexBack')->name('indexBack');
Route::post('/indexBack', 'ParametersController@setUrl');

Route::get('/parameters', 'ParametersController@firstSetUp')->name('parameter');
Route::post('/parameters', 'ParametersController@firstSetUpUpload')->name('parametersUpload');

//Faut lui donner les parametres
Route::post('/back', 'ParametersController@create');

Route::post('/upload', 'UploadController@store_picture')->name('upload');

//callback method to get facebook user infos
Route::get('/facebook/callback', 'ParametersController@index')->name('landing');


Route::get('/home', 'HomeController@index')->name('home');

Route::get('/site/{nom_site}', 'SiteController@show');

Route::post('/indexBack/edit/template', 'ParametersController@editTemplate')->name('edit-template');
Route::post('/indexBack/edit/site', 'ParametersController@editSite')->name('edit-site');

