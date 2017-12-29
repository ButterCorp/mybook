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
        $user = User::firstOrCreate([
            'name' => $request->name,
            'email' => $request->email,
            'idfacebook' => $request->id,
        ]);

        foreach ($request->all() as $key => $value){
            if ($key != "_token" && $key != "id" && $key != "name" && $key != "email"){
                $album = Album::firstOrCreate([
                    'title' => $key,
                    'users_id' => "1",
                ]);

                foreach ($value as $url_photo){
                    $photo = Photo::firstOrCreate([
                        'url' => $url_photo,
                        'albums_id' => "1",
                    ]);
                }

            }
        }

        dd($request->all());
    }
}