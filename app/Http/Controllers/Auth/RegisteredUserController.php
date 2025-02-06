<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Profile;
use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Validation\Rules;
use Illuminate\View\View;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     */
    public function create(): View
    {
        return view('auth.register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request): RedirectResponse
    {
       
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'gender' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:'.User::class],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'gender' => $request->gender,
            'username'=> $this->generateUsername($request->name),
            'password' => Hash::make($request->password),
        ]);

        if($user){
            Profile::create(['user_id' => $user->id]);

            event(new Registered($user));
            
            // Mail::send('emails.test', ['user' => $user], function ($m) use ($user) {
            //     $m->to($user->email, $user->name)->subject('AWS SES Test!');
            // });

            Auth::login($user);
    
            return redirect(route('home', absolute: false));
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
