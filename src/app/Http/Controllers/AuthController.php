<?php

namespace App\Http\Controllers;

use Service\Auth\AuthService;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function register(Request $request, AuthService $authService) {

        dd($request->get('data'));
        #dd($request->all());

        /*
        $validatedRequest = $request->validate([
            'firstname' => ['required', 'string', 'max:255'],
            'surname' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'place' => ['reguired', 'string'],
            'zipCode' => ['reguired', 'int', 'digit:5'],
            'state' => ['reguired', 'string'],
            'street' => ['reguired', 'string'],
            'HouseNumber' => ['reguired', 'string']
        ]);

        */
        return $authService->registerUser($request);
    }
}
