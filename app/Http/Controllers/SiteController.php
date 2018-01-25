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

        if ($site === null)
            return abort(404);

        if ($site->template_selectionned === null)
            return abort(404);

        $albums = Album::where('users_id', '=', $site->user_id)->get();

        $albumsID = [];

        //Get all albums ID
        foreach ($albums as $album)
            array_push($albumsID, $album->id );

        //Get all photos of a user
        $photos = Photo::whereIn('albums_id', $albumsID)->get();

        //$template = Template::where('template_name', '=', $site->template_selectionned)->first();

        //dd($site->template_selectionned);

        return view('front/' . $site->template_selectionned, ['photos' => $photos, 'site' => $site]);
    }
}