<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Session;
use SammyK\LaravelFacebookSdk\LaravelFacebookSdk;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\User;
use App\Album;
use App\Photo;
use App\Site;
use Facebook;

class UploadController extends Controller
{
    /*
     * Fonction qui permet de sauvegarder une image sur le serveur
     */

    public function store_picture(Request $request){

        $fb = App::make('SammyK\LaravelFacebookSdk\LaravelFacebookSdk');
        $file_name = $request->file('image')->getClientOriginalName();

        $request->file('image')->move(
            base_path() . '/public/image/upload', $file_name
        );

        $url = "http://mybook.oklm:8090/image/upload/$file_name";

        $url = "https://cdn.pixabay.com/photo/2017/06/06/06/03/freezing-earth-2376303_960_720.jpg";

        $data = [
            'message' => 'My awesome photo upload example.',
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
    }
}