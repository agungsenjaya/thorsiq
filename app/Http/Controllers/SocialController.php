<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Models\Role;
use DB,Session,Str,Validator,Auth,Hash,Socialite,Exception;

class SocialController extends Controller
{
    public function loginUsingFacebook()
    {
        return Socialite::driver('facebook')->redirect();
    }

    public function callbackFromFacebook()
    {
    try {
        $user = Socialite::driver('facebook')->user();
        $saveUser = User::updateOrCreate([
            'facebook_id' => $user->getId(),
        ],[
            'name' => $user->getName(),
            'email' => $user->getEmail(),
            'password' => Hash::make($user->getName() . $user->getId())
        ]);
        $adm = Role::where('name', 'member')->first();
        
        Auth::loginUsingId($saveUser->id);
        
        if (!Auth::user()->hasRole('member')) {
            $saveUser->attachRole($adm);
        }

        return redirect()->route('member');

        } catch (Exception $e) {
            Session::flash('failed','User has registered manually');
            return redirect()->route('index');
        }
    }
    
    public function loginUsingGoogle()
    {
        return Socialite::driver('google')->redirect();
    }

    public function callbackFromGoogle()
    {
    try {
        $user = Socialite::driver('google')->user();
        $saveUser = User::updateOrCreate([
            'google_id' => $user->getId(),
        ],[
            'name' => $user->getName(),
            'email' => $user->getEmail(),
            'password' => Hash::make($user->getName() . $user->getId())
        ]);
        $adm = Role::where('name', 'member')->first();
        
        Auth::loginUsingId($saveUser->id);
        
        if (!Auth::user()->hasRole('member')) {
            $saveUser->attachRole($adm);
        }

        return redirect()->route('member');
        
    } catch (Exception $e) {
            Session::flash('failed','User has registered manually');
            return redirect()->route('index');
        }
    }
}
