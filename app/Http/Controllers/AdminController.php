<?php

namespace App\Http\Controllers;

use App\Album;
use App\Photo;
use App\Site;
use App\User;
use App\Visitor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function index(Request $request)
    {
        $userAdmin = User::whereRaw('id = ' . Auth::id() . ' and is_admin = 1')->count();

        if($userAdmin == 0)
            abort('403');

        $sites = Site::where('is_active', '=', '1')->get();
        $albums = Album::all();
        $photos = Photo::all();
        $visitors = Visitor::all();

        return view('back/admin', ['sites' => $sites, 'host' => $request->getHttpHost(), 'albums' => $albums, 'photos' => $photos,
            'visitors' => $visitors]);
    }

    public function closeSite(Request $request)
    {
        if(!$request->post('id_site'))
            abort(403);

        Site::where('id', $request->post('id_site'))
            ->update([
                'is_active' => 0,
            ]);

        return redirect()->route('admin')->with('message', 'Le site est maintenant hors-ligne');
    }
}
