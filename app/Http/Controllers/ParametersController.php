<?php
/**
 * Created by PhpStorm.
 * User: Brixton le Brave
 * Date: 06/12/2017
 * Time: 09:28
 */

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
use Facebook;

class ParametersController extends Controller
{


    public function index()
    {
        $fb = App::make('SammyK\LaravelFacebookSdk\LaravelFacebookSdk');
        if (!session_id()) {
            session_start();
        }

        // Obtain an access token.
        try {
            $token = $fb->getAccessTokenFromRedirect();
        } catch (Facebook\Exceptions\FacebookSDKException $e) {

            dd($e->getMessage());
        }

        // Access token will be null if the user denied the request
        // or if someone just hit this URL outside of the OAuth flow.
        if (! $token) {
            // Get the redirect helper
            $helper = $fb->getRedirectLoginHelper();

            if (! $helper->getError()) {
                abort(403, 'Unauthorized action.');
            }

            // User denied the request
            dd(
                $helper->getError(),
                $helper->getErrorCode(),
                $helper->getErrorReason(),
                $helper->getErrorDescription()
            );
        }

        if (! $token->isLongLived()) {
            // OAuth 2.0 client handler
            $oauth_client = $fb->getOAuth2Client();

            // Extend the access token.
            try {
                $token = $oauth_client->getLongLivedAccessToken($token);
            } catch (Facebook\Exceptions\FacebookSDKException $e) {
                dd($e->getMessage());
            }
        }

        $fb->setDefaultAccessToken($token);

        // Save for later
        Session::put('fb_user_access_token', (string) $token);

        // Get basic info on the user from Facebook.
        try {
            $albums = $fb->get('me/albums?fields=name,photos{link,picture,likes.limit(0).summary(true)}');
            $userinfo = $fb->get('me?fields=id,name,email');
        } catch (Facebook\Exceptions\FacebookSDKException $e) {
            dd($e->getMessage());
        }

        // Convert the response to a `Facebook/GraphNodes/GraphUser` collection
        $albums_user = $albums->getGraphEdge();
        $info_user = $userinfo->getGraphUser();
        return view('back/parameters', ['album_user' => $albums_user, 'info_user' => $info_user]);

    }
    public function create(Request $request)
    {
        //We create user if he doesn't exist in database
        $user = User::firstOrCreate([
            'name' => $request->name,
            'email' => $request->email,
            'idfacebook' => $request->id,
        ]);


        //Foreach albums
        foreach ($request->all() as $key => $value){
            if ($key != "_token" && $key != "id" && $key != "name" && $key != "email"){
                //We create album if it doesn't exist in database
                $album = Album::firstOrCreate([
                    'title' => $key,
                    'users_id' => $request->id,
                ]);


                //Foreach photos
                foreach ($value as $url_photo){
                    //We create the photo if it doesn't exist in database
                    $photo = Photo::firstOrCreate([
                        'url' => $url_photo,
                        'albums_id' => $key,
                    ]);
                }

            }
        }

        return redirect()->route('indexBack');
    }

    public function indexBack(Request $request) {

        //die(Auth::id());

        $photos = Photo::all();
        return view('back/index', ['photos' => $photos]);
    }
}