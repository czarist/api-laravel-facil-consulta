<?php
namespace App\Services;

use App\Repositories\AuthRepository;
use Illuminate\Validation\ValidationException;

class AuthService
{
    protected AuthRepository $authRepository;

    public function __construct(AuthRepository $authRepository)
    {
        $this->authRepository = $authRepository;
    }

    public function login(array $credentials): array
    {
        $token = $this->authRepository->login($credentials);

        if (! $token) {
            throw ValidationException::withMessages([
                'email' => ['Credenciais inválidas.'],
            ]);
        }

        return [
            'user'  => $this->authRepository->getAuthenticatedUser(),
            'token' => $token,
        ];
    }

    public function getAuthenticatedUser()
    {
        return $this->authRepository->getAuthenticatedUser();
    }

    public function logout(): void
    {
        $this->authRepository->logout();
    }
}
