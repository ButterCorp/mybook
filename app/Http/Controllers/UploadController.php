<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;
use Facebook;

class UploadController extends Controller
{
    /*
     * Fonction qui permet de sauvegarder une image sur le serveur
     */

    public function store_picture(Request $request){

        $fb = App::make('SammyK\LaravelFacebookSdk\LaravelFacebookSdk');

        $path = $request->file('image')->store(
            'images'
        );
        $url =  "https://mybook.ovh/storage/".$path;

        $data = [
            'message' => 'Uploaded via Mybook.',
            'source' => $fb->fileToUpload($url),
        ];

        try {
            // Returns a `Facebook\FacebookResponse` object
            $response = $fb->post('/me/photos', $data, session()->get('fb_user_access_token'));
        } catch(Facebook\Exceptions\FacebookResponseException $e) {
            echo 'Graph returned an error: ' . $e->getMessage();
            exit;
        } catch(Facebook\Exceptions\FacebookSDKException $e) {
            echo 'Facebook SDK returned an error: ' . $e->getMessage();
            exit;
        }

        Session::flash('message', "Votre photo a été uploadée");
        return Redirect::back();
    }
}