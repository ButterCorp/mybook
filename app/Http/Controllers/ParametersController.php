<?php
/**
 * Created by PhpStorm.
 * User: Brixton le Brave
 * Date: 06/12/2017
 * Time: 09:28
 */

namespace App\Http\Controllers;

use App\Template;
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
        $user = User::where('facebook', $info_user["id"])->get();

        if($user != "[]"){
            return redirect()->route('indexBack');
        }
        return redirect()->route('login')->with(['album_user' => $albums_user, 'info_user' => $info_user]);

    }


    public function indexBack(Request $request) {

        //die(Auth::id());
        //
        //Au lieu de all() afficher ->where('id', $iduser)
        $user = User::where('id', '=', 1)->first();

        $site = Site::where('user_id', '=', $user->id)->first();

        $albums = Album::where('users_id', '=', $site->user_id)->get();

        $albumsID = [];


        //Get all albums ID
        foreach ($albums as $album)
            array_push($albumsID, $album->id );

        //Get all photos of a user
        $photos = Photo::whereIn('albums_id', $albumsID)->get();

        $templates = Template::all();

        return view('back/index', ['photos' => $photos, 'albums' => $albums, 'templates' => $templates, 'site' => $site]);
    }

    public function editTemplate(Request $request) {

        Site::where('id', 1)
            ->update(['template_selectionned' => $request->template]);

        //return redirect($this->indexBack($request))->with(['message', 'Le template a été mis en place']);
        return redirect()->route('indexBack')->with('message', 'Le template à été mis en place');
    }
}