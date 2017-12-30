<?php
/**
 * Created by PhpStorm.
 * User: Brixton le Brave
 * Date: 06/12/2017
 * Time: 09:28
 */

namespace App\Http\Controllers;


use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;
use App\Album;
use App\Photo;

class ParametersController extends Controller
{
    public function index(Request $request)
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
}