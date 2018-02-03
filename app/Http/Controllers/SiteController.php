<?php
/**
 * Created by PhpStorm.
 * User: Gili
 * Date: 17/01/2018
 * Time: 12:00
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
use App\Site;
use App\Visitor;
use Facebook;
use App\Template;



class SiteController extends Controller
{
    /*
     * Fonction qui permet d'afficher un site
     * Prends en paramètre un nom de site qui est une string
     * Affiche le site, si le site existe, sinon renvoie sur une page d'erreur 404
     */
    public function show($nom_site){
        $site = Site::where('site_url', '=', $nom_site)->first();

        if ($site === null || $site->template_selectionned === null || $site->statut == 0)
            return abort(404);

        $albums = Album::where('users_id', '=', $site->user_id)->get();

        $albumsID = [];

        //Get all albums ID
        foreach ($albums as $album)
            array_push($albumsID, $album->id );

        //Get all photos of a user
        $photos = Photo::whereIn('albums_id', $albumsID)->get();

        Visitor::create([
            'site_id' => $site->id,
            'date_visit' => date('Y-m-d H:i:s')
        ]);

        return view('front/' . $site->template_selectionned, ['photos' => $photos, 'site' => $site]);
    }

    public function editSiteFooter(Request $request) {

        if($request->post('footer-content'))
            if(!Site::where('user_id',  Auth::id())->where('footer_statut', '=', 1)->first())
                return redirect()->route('indexBack')->with('message', 'Vous devez activer le footer pour le modifier');

        Site::where('user_id', Auth::id())
            ->update([
                'footer_content' => $request->post('footer-content')
            ]);

        return redirect()->route('indexBack')->with('message', 'Le footer du site à été mis à jour');
    }

    public function editSiteSlug(Request $request) {

        if($request->post('slug-content'))
            if(!Site::where('user_id',  Auth::id())->where('slug_statut', '=', 1)->first())
                return redirect()->route('indexBack')->with('message', 'Vous devez activer le slogan pour le modifier');


        Site::where('user_id', Auth::id())
            ->update([
                'slug_content' => $request->post('slug-content')
            ]);

        return redirect()->route('indexBack')->with('message', 'Le slogan du site à été mis à jour');
    }

    public function editSiteNetwork(Request $request) {

        //Faire un tableau key => value pour mieux faire la requete
        $url = [];
        foreach ($request->post() as $req)
            array_push($url, $req);

        Site::where('user_id', Auth::id())
            ->update([
                'facebook_url' => (isset($url[1]) ? $url[1] : null),
                'instagram_url' => (isset($url[2]) ? $url[2] : null),
                'google_url' => (isset($url[3]) ? $url[3] : null),
                'twitter_url' => (isset($url[4]) ? $url[4] : null),
                'linkedin_url' => (isset($url[5]) ? $url[5] : null)
            ]);

        return redirect()->route('indexBack')->with('message', 'Les liens des réseaux sociaux ont été mis à jour');
    }
}

