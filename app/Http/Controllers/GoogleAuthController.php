<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;

class GoogleAuthController extends Controller
{
    public function redirectToGoogle()
    {
        return Socialite::driver('google')->redirect();
    }

    public function handleGoogleCallback()
    {
        try {
            $user = Socialite::driver('google')->user();
            
            $finduser = User::where('google_id', $user->id)->first();
            
            if($finduser){
                Auth::login($finduser);
                
                // Redirect berdasarkan role
                if ($finduser->isAdmin()) {
                    return redirect()->intended(route('admin.dashboard'));
                }
                return redirect()->intended(route('dashboard'));
                
            } else {
                // Generate username dari email
                $username = explode('@', $user->email)[0];
                $count = 1;
                $tempUsername = $username;
                while(User::where('username', $tempUsername)->exists()) {
                    $tempUsername = $username . $count;
                    $count++;
                }   
                
                $newUser = User::create([
                    'name' => $user->name,
                    'username' => $tempUsername,
                    'email' => $user->email,
                    'google_id'=> $user->id,
                    'avatar' => $user->avatar,
                    'password' => encrypt('i23exa9712nxasdFKADLESU9'),
                    'role' => 'user'
                ]);
    
                Auth::login($newUser);
                return redirect()->intended(route('dashboard'));
            }
    
        } catch (\Exception $e) {
            return redirect()->route('login')->with('error', 'Sepertinya telah terjadi kesalahan di Google. Silahkan coba lagi.');
        }
    }
}
