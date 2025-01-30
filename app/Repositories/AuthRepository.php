<?php
namespace App\Repositories;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Tymon\JWTAuth\Facades\JWTAuth;

class AuthRepository
{

    public function login(array $credentials): ?string
    {
        return JWTAuth::attempt($credentials);
    }

    public function getAuthenticatedUser(): ?User
    {
        return Auth::user();
    }

    public function logout(): void
    {
        JWTAuth::invalidate(JWTAuth::getToken());
    }
}
