<?php

namespace App\Http\Controllers\Auth;

use App\Album;
use App\Http\Controllers\Controller;
use App\Photo;
use App\Site;
use App\User;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
     CUSTOMS !
    The login is processing via ID and we populate / update the albums and photos
   via Facebook
    |
    */
    /**
     * Handle an authentication attempt.
     *
     * @return Response
     */
    public function authenticate()
    {
        /* Get the user Fb information from session data */
        $user = session('info_user');

        /* UserToFind is an eloquent collection-array of User Objects */
        $userToFind = User::where('facebook', $user["id"])->get();
        if($userToFind != "[]"){

            if (Auth::attempt(['id' =>  $userToFind[0]->id])) {
                return redirect()->intended('indexBack');
            }
        }

        /* UserSaved is an object User */
        $userSaved = User::create([
            'name' => $user['name'],
            'email' => $user['email'],
            'facebook' => $user['id']
        ]);

        Site::create([
            'user_id' => $userSaved['id'],
            'site_url' => str_replace(' ', '', strtolower($user['name'])),
            'statut' => "1",
            'created_at' => date('now'),
            'updated_at' => date('now')
        ]);
        $albums = session('album_user');

        if (Auth::attempt(['id' =>  $userSaved['id']])) {
            return redirect()->intended('/parameters')->with(['album_user' => $albums]);
        }


    }

    public function update()
    {

    }

    public function logout()
    {
        Auth::logout();
        redirect()->route('welcome')->with('message', 'Vous avez été deconnecté');
    }
}
