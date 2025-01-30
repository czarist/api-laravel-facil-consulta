<?php
namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use App\Services\AuthService;
use Illuminate\Http\JsonResponse;

class AuthController extends Controller
{
    protected AuthService $authService;

    public function __construct(AuthService $authService)
    {
        $this->authService = $authService;
    }

    public function login(LoginRequest $request): JsonResponse
    {
        return response()->json($this->authService->login($request->validated()));
    }

    public function me(): JsonResponse
    {
        return response()->json($this->authService->getAuthenticatedUser());
    }

    public function logout(): JsonResponse
    {
        $this->authService->logout();

        return response()->json(['message' => 'Logout realizado com sucesso']);
    }
}
