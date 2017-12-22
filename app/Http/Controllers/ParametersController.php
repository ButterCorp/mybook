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

class ParametersController extends Controller
{
    public function index(Request $request)
    {

        $value = $request->input('Profile Pictures');

        die($value);

        $photos = $request->input('select');

        die($photos);
    }
}