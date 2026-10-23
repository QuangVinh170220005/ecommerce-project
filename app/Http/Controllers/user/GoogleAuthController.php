<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Support\Str;
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
        $googleUser = Socialite::driver('google')->user();

        $user = User::where('id_google', $googleUser->getId())->first();

        if ($user) {
            Auth::login($user);
        }else{
            $existingUser = User::where('email', $googleUser->getEmail())->first();

                if ($existingUser) {

                    $existingUser->update([
                        'id_google' => $googleUser->getId(),
                    ]);
                    Auth::login($existingUser);
                } else {
                    // Tạo tài khoản mới hoàn toàn
                    $newUser = User::create([
                        'name' => $googleUser->getName(),
                        'email' => $googleUser->getEmail(),
                        'id_google' => $googleUser->getId(),
                        'password' => bcrypt(Str::random(16)),
                        'level' => 0,
                    ]);

                    Auth::login($newUser);
                }
            }

            return redirect()->intended('/home');
        }
}
