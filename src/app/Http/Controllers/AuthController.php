<?php

namespace App\Http\Controllers;

use App\Mail\RegisterMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use App\Http\Requests\RegistrationFormRequest;
use App\User;
use Exception;
use Illuminate\Http\Response;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Mail;

class AuthController extends Controller
{
    /**
     * Create a new AuthController instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:api', ['except' => ['login', 'signUp']]);
    }

    /**
     * Get a JWT via given credentials.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function login(Request $request)
    {
        #$credentials = request(['email', 'password']);

        $input['password'] = $request->json('data.Passwort');

        if(!empty($request->json('data.Email'))) {
            $input['Email'] = $request->json('data.Email');
        } else if(!empty($request->json('data.Loginname'))) {
            $input['Loginname'] = $request->json('data.Loginname');
        }

        if (! $token = auth()->attempt($input)) {
            return response()->json(['error' => 'Unauthorized'], 401);
        }

        return $this->respondWithToken($token);
    }

    /**
     * create a user
     */
    public function signUp(RegistrationFormRequest $request) {

        $user = new User();
        $user->Vorname = $request->json('data.Vorname');
        $user->Nachname = $request->json('data.Nachname');
        $user->Loginname = $request->json('data.Loginname');
        $user->Nachname = $request->json('data.Nachname');
        $user->PasswortHash = bcrypt($request->json('data.Passwort'));
        $user->PLZ = $request->json('data.PLZ');
        $user->Email = $request->json('data.Email');
        $user->Adresse = $request->json('data.Adresse');

        try{

            $user->save();
            Mail::to($user->Email)->send(new RegisterMail($user));

        }catch(Exception $e) {
            dd($e);
            return response()->json(['status' => Response::HTTP_BAD_REQUEST, 'data' => ['test'], "message" => 'Es existiert bereit ein Benutzer mit dieser Email/Loginname'], Response::HTTP_BAD_REQUEST);
        }

        return $this->login($request);
    }

    /**
     * Get the authenticated User.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function me()
    {
        return response()->json(auth()->user());
    }

    /**
     * Log the user out (Invalidate the token).
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function logout()
    {
        auth()->logout();

        return response()->json(['message' => 'Successfully logged out']);
    }

    /**
     * Refresh a token.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function refresh()
    {
        return $this->respondWithToken(auth()->refresh());
    }

    /**
     * Get the token array structure.
     *
     * @param  string $token
     *
     * @return \Illuminate\Http\JsonResponse
     */
    protected function respondWithToken($token)
    {
        return response()->json([
            'access_token' => $token,
            'token_type' => 'bearer',
            'expires_in' => auth()->factory()->getTTL() * 60
        ]);
    }
}
