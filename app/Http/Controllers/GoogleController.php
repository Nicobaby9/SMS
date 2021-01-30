<?php
 
namespace App\Http\Controllers;
 
use Illuminate\Http\Request;
use Auth;
use Socialite;
use App\Model\User;
 
class GoogleController extends Controller
{
    public function redirect()
    {
        return Socialite::driver('google')->redirect();
    }
 
    public function callback()
    {
        if (Auth::check()) {
            return redirect('/');
        }
 
        $oauthUser = Socialite::driver('google')->user();
        $user = User::where('google_id', $oauthUser->id)->first();
        if ($user) {
            Auth::loginUsingId($user->id);
            return redirect('/');
        } else {
            $newUser = User::create([
                'name' => $oauthUser->name,
                'email' => $oauthUser->email,
                'google_id'=> $oauthUser->id,
                'password' => md5($oauthUser->token),
            ]);
            Auth::login($newUser);
            return redirect('/');
        }
    }
}