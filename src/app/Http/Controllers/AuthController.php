<?php

namespace App\Http\Controllers;

use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use App\Http\Requests\RegistrationFormRequest;
use Services\Auth\AuthService;

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
     * @param Request     $request
     * @param AuthService $authService
     *
     * @return JsonResponse
     */
    public function login(Request $request, AuthService $authService) : JsonResponse
    {
        return $authService->login($request);
    }

    /**
     * create a user
     *
     * @param RegistrationFormRequest $request
     *
     * @param AuthService             $authService
     *
     * @return JsonResponse
     */
    public function signUp(RegistrationFormRequest $request, AuthService $authService) {

        return $authService->signUp($request);
    }

    /**
     * Get the authenticated User.
     *
     * @param AuthService $authService
     *
     * @return JsonResponse
     */
    public function me(AuthService $authService) : JsonResponse
    {
        return  $authService->me();
    }

    /**
     * Log the user out (Invalidate the token).
     *
     * @param AuthService $authService
     *
     * @return JsonResponse
     */
    public function logout(AuthService $authService) : JsonResponse
    {
        return $authService->logout();
    }

    /**
     * Refresh a token.
     *
     * @return JsonResponse
     */
    public function refresh(AuthService $authService) : JsonResponse
    {
        return  $authService->refresh();
    }
}
