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
use App\Site;
use Facebook;

class TestController extends Controller
{



    public function createOrUpdateUser(Request $request)
    {
        dump($request->session());
        dump($request->session()->get('info_user')["id"]);

    }

}