<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Laravel\Socialite\Facades\Socialite;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class GoogleController extends Controller
{
    // Redirect to Google
    public function redirect()
    {
        return Socialite::driver('google')->redirect();
    }

    // Handle callback
    public function callback()
    {
        // $googleUser = Socialite::driver('google')->user();
          $googleUser = Socialite::driver('google')->stateless()->user();

        // Check if user already exists
        $user = User::where('email', $googleUser->getEmail())->first();

        if ($user) {

        // Update google_id if missing
            if (!$user->google_id) {
                $user->update([
                    'google_id' => $googleUser->getId(),
                ]);
            }
            // Existing user → login
            Auth::login($user);
        } else {
            // New user → register
            $user = User::create([
                'name' => $googleUser->getName(),
                'email' => $googleUser->getEmail(),
                'google_id' => $googleUser->getId(),
                // 'avatar' => $googleUser->getAvatar(),
                'password' => bcrypt(Str::random(16)), // random password
            ]);

            Auth::login($user);
        }

        return redirect('/dashboard'); // change to your page
    }
}