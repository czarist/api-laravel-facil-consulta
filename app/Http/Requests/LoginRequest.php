<?php
namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class LoginRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'email'    => 'required|email',
            'password' => 'required',
        ];
    }

    public function messages(): array
    {
        return [
            'email.required'    => 'O campo e-mail é obrigatório.',
            'email.email'       => 'Insira um e-mail válido.',
            'password.required' => 'O campo senha é obrigatório.',
        ];
    }
}
