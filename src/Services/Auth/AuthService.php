<?php
declare(strict_types = 1);

namespace Services\Auth;

use App\Mail\RegisterMail;
use App\User;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

/**
 * Class AuthService
 *
 * @author Sebastian Kaltenmaier <sebastian.kaltenmaier@rsu-reifen.de>
 * @since  2020-02-13
 */
class AuthService
{
    /**
     * login
     *
     * @since  2020-02-13
     *
     * @param Request $request
     *
     * @return   JsonResponse
     *
     */
    public function login(Request $request) : JsonResponse
    {
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
     * Sign-Up
     *
     * @since  2020-02-13
     *
     * @param Request $request
     *
     * @return   JsonResponse
     *
     */
    public function signUp(Request $request) : JsonResponse
    {
        $user = new User();
        $user->Vorname = $request->json('data.Vorname');
        $user->Nachname = $request->json('data.Nachname');
        $user->Loginname = $request->json('data.Loginname');
        $user->Nachname = $request->json('data.Nachname');
        $user->PasswortHash = bcrypt($request->json('data.Passwort'));
        $user->PLZ = $request->json('data.PLZ');
        $user->Email = $request->json('data.Email');
        $user->Adresse = $request->json('data.Adresse');

        $user->save();
        Mail::to($user->Email)->send(new RegisterMail($user));

        return $this->login($request);
    }

    /**
     * get user data
     *
     * @since  2020-02-13
     *
     * @return   JsonResponse
     *
     */
    public function me() : JsonResponse
    {
        return response()->json(auth()->user());
    }

    /**
     * invalidate token
     *
     * @since  2020-02-13
     *
     * @return   JsonResponse
     *
     */
    public function logout() : JsonResponse
    {
        auth()->logout();

        return response()->json(['message' => 'Successfully logged out']);
    }

    /**
     * get new token
     *
     * @since  2020-02-13
     *
     * @return   JsonResponse
     *
     */
    public function refresh() : JsonResponse
    {
        return $this->respondWithToken(auth()->refresh());
    }

    /**
     * Get the token array structure.
     *
     * @param  string $token
     *
     * @return JsonResponse
     */
    protected function respondWithToken($token) : JsonResponse
    {
        return response()->json([
            'access_token' => $token,
            'token_type' => 'bearer',
            'expires_in' => auth()->factory()->getTTL() * 60
        ]);
    }
}
