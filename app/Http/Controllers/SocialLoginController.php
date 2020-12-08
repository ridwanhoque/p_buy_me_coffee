<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SocialLoginController extends Controller
{
    public function index(){
        return view('social_login.index');
    }
}
