<?php

namespace App\Http\Controllers;

use App\Models\User;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;

class GoogleController extends Controller
{
    private $google_user;

    function __construct()
    {
        $google_user = Socialite::driver('google')->user();
    }

    public function redirectToGoogle(){
        return Socialite::driver('google')->redirect();
    }

    public function handleGoogleCallback(){
        try{

            $google_id = $this->google_user->id;
            $find_user = User::findOrFail('google_id', $google_id)->first();

            if($find_user){
                Auth::login($find_user);

                return redirect()->intended('dashbpard');
            }else{
                $user = User::creat([
                    'name' => $this->google_user->name,
                    'email' => $this->google_user->email,
                    'google_id' => $this->google_user->id,
                    'password' => encrypt('12345678')
                ]);

                if($user){
                    Auth::login($user);

                    return redirect()->intended('dashboard');
                }
            }

        }catch(Exception $exception){
            dd($exception->getMessage());
        }
    }
}
