<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\Models\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        $messages = [
            "required" => "Поле :attribute обязательно.",
            "string" => "Значение поля :attribute должно быть строкой.",
            "max.numeric" => "Значение поля :attribute не может быть больше :max.",
            "unique" => "Такое значение поля :attribute уже существует.",
            "email" => "Значение поля :attribute должно быть действительным электронным адресом.",
            "min.numeric" => "Значение поля :attribute должно быть не меньше :min.",
            "image" => "Файл, указанный в поле :attribute, должен быть изображением.",
            "confirmed" => "Значение поля :attribute не совпадает с подтверждаемым.",
        ];
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'phone' => ['required', 'unique:users'],
            'avatar' => 'image|nullable',
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ], $messages);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Models\User
     */
    protected function create(array $data)
    {

        return User::create([
            'name' => $data['name'],
            'phone' => $data['phone'],
            'avatar' => isset($data['avatar']) ? $data['avatar']->getClientOriginalName() : null,
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
        ]);
    }
}
