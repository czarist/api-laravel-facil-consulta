<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class MedicoRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'name'          => 'required|string|max:255',
            'especialidade' => 'required|string|max:255',
            'cidade_id'     => 'required|exists:cidades,id',
        ];
    }

    public function messages(): array
    {
        return [
            'name.required'          => 'O campo name é obrigatório.',
            'name.string'            => 'O name deve ser um texto válido.',
            'name.max'               => 'O name pode ter no máximo 255 caracteres.',
            'especialidade.required' => 'O campo especialidade é obrigatório.',
            'especialidade.string'   => 'A especialidade deve ser um texto válido.',
            'especialidade.max'      => 'A especialidade pode ter no máximo 255 caracteres.',
            'cidade_id.required'     => 'O campo cidade é obrigatório.',
            'cidade_id.exists'       => 'A cidade informada não existe no banco de dados.',
        ];
    }
}
