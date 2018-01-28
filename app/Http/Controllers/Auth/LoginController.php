<?php

namespace App\Http\Controllers\Auth;

use App\Album;
use App\Http\Controllers\Controller;
use App\Photo;
use App\Site;
use App\User;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
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
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/parameters';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }
    public function showLoginForm()
    {
        return view('welcome');
    }

    protected function guard()
    {
        return Auth::guard('custom');
    }
    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create()
    {

        $user = session('info_user');

        $userToFind = User::where('facebook', $user["id"])->get();
        if($userToFind != "[]"){
            return $userToFind;
        }
        $userSaved = User::create([
            'name' => $user['name'],
            'email' => $user['email'],
            'facebook' => $user['id']
        ]);

        //die($userSaved['id']);

        Site::create([
            'user_id' => $userSaved['id'],
            'site_url' => str_replace(' ', '', strtolower($user['name'])),
            'statut' => "1",
            'created_at' => date('now'),
            'updated_at' => date('now')
        ]);

        $albums = session('album_user');

        //ne pas tout inserer ici
        foreach ($albums as $album)
        {
            $albumSaved = Album::create([
                'album_id'=> $album['id'],
                'title' => $album['name'],
                'users_id'=> $userSaved['id']
                ]);
            foreach($album["photos"] as $photo)
            {
                Photo::create([
                    'url' => $photo['picture'],
                    'albums_id' => $albumSaved['id']
                ]);
            }
        }
        return $userSaved;
    }

    public function update()
    {

    }
}
