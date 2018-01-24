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
class SiteController extends Controller
{
    /*
     * Fonction qui permet d'afficher un site
     * Prends en paramètre un nom de site qui est une string
     * Affiche le site, si le site existe, sinon renvoie sur une page d'erreur 404
     */
    public function show($nom_site){
        $site = Site::where('site_url', '=', $nom_site)->first();
        if ($site === null){
            return abort(404);
        } else {
            echo "<h1>Bienvenue sur le site $nom_site </h1>";
            $photos = Photo::all();
            foreach ($photos as $photo){
                echo $photo->url.'<br>';
            }
        }
    }
}