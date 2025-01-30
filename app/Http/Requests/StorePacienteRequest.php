<?php
namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StorePacienteRequest extends FormRequest
{

    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'name'    => 'required|string|max:255',
            'celular' => 'required|string|max:20',
            'cpf'     => 'required|string|size:14|unique:pacientes,cpf',
        ];
    }

    public function messages(): array
    {
        return [
            'name.required'    => 'O campo nome é obrigatório.',
            'name.string'      => 'O nome deve ser uma string válida.',
            'name.max'         => 'O nome não pode ter mais de 255 caracteres.',
            'celular.required' => 'O campo celular é obrigatório.',
            'celular.string'   => 'O celular deve ser uma string válida.',
            'celular.max'      => 'O celular não pode ter mais de 20 caracteres.',
            'cpf.required'     => 'O campo CPF é obrigatório.',
            'cpf.size'         => 'O CPF deve ter exatamente 14 caracteres (000.000.000-00).',
            'cpf.unique'       => 'Já existe um paciente cadastrado com este CPF.',
        ];
    }
}
