<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Laravel\Socialite\Facades\Socialite;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    public function redirectToGoogle()
    {
        return Socialite::driver('google')->redirect();
    }

    public function handleGoogleCallback()
    {
        $googleUser = Socialite::driver('google')->user();

        $user = User::where('email', $googleUser->email)->first();

        if ($user) {
            Auth::login($user);
            return redirect('/profile');
        } else {
            $newUser = new User;
            $newUser->name = $googleUser->name;
            $newUser->email = $googleUser->email;
            $newUser->avatar = $googleUser->getAvatar();
            $newUser->password = bcrypt(str(16));
            $newUser->save();

            Auth::login($newUser);
            return redirect('/profile');
        }
    }
    public function redirectToVkontakte()
    {
        return Socialite::driver('vkontakte')->redirect();
    }

    public function handleVkontakteCallback()
    {
        $vkontakteUser = Socialite::driver('vkontakte')->user();
        $user = User::where('email', $vkontakteUser->email)->first();

        if ($user) {
            Auth::login($user);
            return redirect()->intended('/profile');
        } else {
            $newUser = new User();
            $newUser->name = $vkontakteUser->getName();
            $newUser->email = $vkontakteUser->getEmail();
            $newUser->avatar = $vkontakteUser->getAvatar();
            $newUser->password = bcrypt(str(16));
            $newUser->save();

            Auth::login($newUser);
            return redirect()->intended('/profile');
        }
    }


    public function redirectToYandex()
    {
        return Socialite::driver('yandex')->redirect();
    }

    public function handleYandexCallback()
    {
        $yandexUser = Socialite::driver('yandex')->user();

        $user = User::where('email', $yandexUser->email)->first();
        if ($user) {
            Auth::login($user);
            return redirect('/profile');
        } else {
            $newUser = new User();
            $newUser->name = $yandexUser->getName();
            $newUser->email = $yandexUser->getEmail();
            $newUser->avatar = $yandexUser->getAvatar();
            $newUser->password = bcrypt(str(16));
            $newUser->save();

            Auth::login($newUser);
            return redirect('/profile');
        }
    }


    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }
}
