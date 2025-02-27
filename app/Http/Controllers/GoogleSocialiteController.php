<?php

namespace App\Http\Controllers;

use App\Models\Profile;
use App\Models\User;
use App\Models\Wallet;
use Illuminate\Http\Request;
use Illuminate\Auth\Events\Registered;
use Laravel\Socialite\Facades\Socialite;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Exception;
use Illuminate\Support\Str;



class GoogleSocialiteController extends Controller
{
    public function redirectToGoogle()
    {
        return Socialite::driver('google')->redirect();
    }

    public function handleGoogleCallback()
    {
        try {
        
            $user = Socialite::driver('google')->stateless()->user();
            // dd($user);
            $finduser = User::where('google_id', $user->id)->first();
         
            if($finduser){
         
                Auth::login($finduser);
                return redirect(route('home', absolute: false));
                // return redirect()->intended('home');
         
            }else{
                $psword = Str::random(16);
                $newUser = User::updateOrCreate(['email' => $user->email],[
                        'name' => $user->name,
                        'google_id'=> $user->id,
                        'name' => $user->name,
                        'avarta' => $user->avatar,
                        'gender' => 'Not-Yet-Decided',
                        'username' => $this->generateUsername($user->name),
                        'password' => Hash::make($psword), //encrypt('123456dummy')
                ]);

                if($newUser){

                    event(new Registered($user));
                    
                    Profile::create(['user_id' => $newUser->id]);
                    Wallet::create(['user_id' => $newUser->id, 'balance' => 0.0, 'points' => 0.0]);
         
                    Auth::login($newUser);
        
                    return redirect(route('home', absolute: false));
                }

            }
        
        } catch (Exception $e) {
            return redirect(url('login'));
            // dd($e->getMessage());
        }
    }

    private function generateUsername($name){
        // Remove extra whitespace
        $fullName = trim($name);
        
        // Split the name by spaces
        $nameParts = explode(' ', $fullName);
        
        // Build username based on number of name parts
        if (count($nameParts) > 1) {
            // If more than one name, use the first name plus the first letter of the last name
            $username = strtolower($nameParts[0]) . strtolower(substr(end($nameParts), 0, 1));
        } else {
            // If only one name, just use that name (lowercase)
            $username = strtolower($nameParts[0]);
        }
        
        // Append a random 4-digit number
        $username .= rand(1000, 9999);
        
        return $username;

    }


}
