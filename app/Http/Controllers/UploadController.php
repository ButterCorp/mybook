<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;
use Facebook;

class UploadController extends Controller
{
    /*
     * Fonction qui permet de sauvegarder une image sur le serveur
     */

    public function store_picture(Request $request)
    {

        if (Auth::guest()) {
            return abort(403);
        }

        $fb = App::make('SammyK\LaravelFacebookSdk\LaravelFacebookSdk');
        if ($request->file('image')->isValid()) {

            $fileName = Auth::id() . '.' . $request->image->extension();
            $path = $request->file('image')->storeAs(
                'public/images', $fileName
            );

            $message = '';
            if(!empty($request->message)){
                $message = $request->message;
            }

            $data = [
                'message' => $message,
                'source' => $fb->fileToUpload(asset('/storage/images/' . $fileName)),
            ];

            try {
                // Returns a `Facebook\FacebookResponse` object
                $response = $fb->post('/me/photos', $data, session()->get('fb_user_access_token'));
            } catch (Facebook\Exceptions\FacebookResponseException $e) {
                echo 'Graph returned an error: ' . $e->getMessage();
                exit;
            } catch (Facebook\Exceptions\FacebookSDKException $e) {
                echo 'Facebook SDK returned an error: ' . $e->getMessage();
                exit;
            }
                unlink(base_path().'/storage/app/public/images/' . $fileName);
                return redirect()->route('parameter')->with('message', "Votre photo a été uploadée");
        }
        return abort(403);
    }
}