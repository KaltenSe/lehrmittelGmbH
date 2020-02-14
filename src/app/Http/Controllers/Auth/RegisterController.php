<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\User;
use Carbon\Carbon;
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
    #protected $redirectTo = RouteServiceProvider::HOME;

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
        return Validator::make($data, [
            'Loginname' => ['required', 'string'],
            'Vorname' => ['required', 'string'],
            'Nachname' => ['required', 'string'],
            'Adresse' => ['required', 'string'],
            'PLZ' => ['required', 'string'],
            'Email' => ['required', 'string', 'email', 'max:255'],
            'Passwort' => ['required', 'string', 'min:8'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
        return User::create([
            'Loginname' => $data['Loginname'],
            'Vorname' => $data['Vorname'],
            'Email' => $data['Email'],
            'Nachname' => $data['Nachname'],
            'Adresse' => $data['Adresse'],
            'PLZ' => $data['PLZ'],
            'Passwort' => Hash::make($data['Passwort']),
            'Erstellt' => Carbon::now()
        ]);
    }
}
