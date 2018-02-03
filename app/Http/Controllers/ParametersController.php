<?php
/**
 * Created by PhpStorm.
 * User: Brixton le Brave
 * Date: 06/12/2017
 * Time: 09:28
 */

namespace App\Http\Controllers;

use App\Template;
use App\Visitor;
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
    protected $fb;

    public function __construct()
    {
        $this->fb = App::make('SammyK\LaravelFacebookSdk\LaravelFacebookSdk');
    }

    public function index()
    {
        if (!session_id()) {
            session_start();
        }

        // Obtain an access token.
        try {
            $token = $this->fb->getAccessTokenFromRedirect();
        } catch (Facebook\Exceptions\FacebookSDKException $e) {

            dd($e->getMessage());
        }

        // Access token will be null if the user denied the request
        // or if someone just hit this URL outside of the OAuth flow.
        if (! $token) {
            // Get the redirect helper
            $helper = $this->fb->getRedirectLoginHelper();

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
            $oauth_client = $this->fb->getOAuth2Client();

            // Extend the access token.
            try {
                $token = $oauth_client->getLongLivedAccessToken($token);
            } catch (Facebook\Exceptions\FacebookSDKException $e) {
                dd($e->getMessage());
            }
        }

        $this->fb->setDefaultAccessToken($token);

        // Save for later
        Session::put('fb_user_access_token', (string) $token);

        // Get basic info on the user from Facebook.
        try {
            $albums = $this->fb->get('me/albums?fields=name,photos{link,picture,images,likes.limit(0).summary(true)}');
            //$albums = $this->fb->get('me/albums?fields=name,photos{link,picture,images,likes.limit(0).summary(true),comments.summary(true).limit(0)}');
            $userinfo = $this->fb->get('me?fields=id,name,email');
        } catch (Facebook\Exceptions\FacebookSDKException $e) {
            dd($e->getMessage());
        }

        // Convert the response to a `Facebook/GraphNodes/GraphUser` collection
        $albums_user = $albums->getGraphEdge();
        $info_user = $userinfo->getGraphUser();

        return redirect()->route('login')->with(['album_user' => $albums_user, 'info_user' => $info_user]);

    }

    public function firstSetUp() {
        if(Auth::check() == false){
            return abort(404);
        }
        $albums = session('album_user');
        return view('back/parameters', ['albums' => $albums]);

    }

    public function firstSetUpUpload(Request $request) {
        if(Auth::check() == false){
            return abort(404);
        }

        //Foreach albums
        foreach ($request->all() as $key => $value){
            if ($key != "_token" && $key != "id" && $key != "name" && $key != "email"){
                //We create album if it doesn't exist in database
                $id = explode("-", $key);

                $album = Album::firstOrCreate([
                    'album_id' => $id[0],
                    'title' => $id[1],
                    'users_id' => Auth::id(),
                    'created_at' => date('now'),
                    'updated_at' => date('now')
                ]);
                //Foreach photos
                foreach ($value as $url_photo){
                    //We create the photo if it doesn't exist in database
                    $url_photo = explode('|', $url_photo);
                    $photo = Photo::firstOrCreate([
                        'url' => $url_photo[0],
                        'nb_likes' => intval($url_photo[1]),
                        'albums_id' => $album->id,
                        'created_at' => date('now'),
                        'updated_at' => date('now')
                    ]);
                }
            }
        }
        return redirect()->route('indexBack');
    }

    public function indexBack(Request $request) {
        if(Auth::check() == false){
            return abort(404);
        }
        //die(Auth::id());
        //
        //Au lieu de all() afficher ->where('id', $iduser)
        $user = User::findOrFail(Auth::id());

        $name = explode(" ", $user->name);

        $site = Site::where('user_id', '=', $user->id)->first();

        $albums = Album::where('users_id', '=', $site->user_id)->get();

        $albumsID = [];


        //Get all albums ID
        foreach ($albums as $album)
            array_push($albumsID, $album->id );

        //Get all photos of a user
        $photos = Photo::whereIn('albums_id', $albumsID)->get();

        $templates = Template::all();

        $visitorsOfMonth = Visitor::getVisitorByMonth($site->id);

        return view('back/index', ['photos' => $photos, 'albums' => $albums, 'templates' => $templates, 'site' => $site, 'firstname' => $name[0],
            'lastname' => $name[1], 'email' => $user->email, 'visitor' => $visitorsOfMonth]);
    }

    public function editTemplate(Request $request) {

        //Recuperer l'user_id pour modifier les requetes plutot que int static

        Site::where('user_id', Auth::id())
            ->update([
                'template_selectionned' => $request->template,
                'statut' => (isset($request->maintenance)) ? 0 : 1
            ]);

        return redirect()->route('indexBack')->with('message', 'Le template à été mis en place');
    }

    public function editSite(Request $request) {

        Site::where('user_id', Auth::id())
            ->update([
                'title' => $request->site_name,
                'footer_statut' => (isset($request->footer)) ? 1 : 0,
                'slug_statut' => (isset($request->slug)) ? 1 : 0,
                'network_statut' => (isset($request->network)) ? 1 : 0,
                ]);

        return redirect()->route('indexBack')->with('message', 'Les paramètres du site ont été actualisés');
    }
}