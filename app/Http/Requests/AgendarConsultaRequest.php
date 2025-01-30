<?php
namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class AgendarConsultaRequest extends FormRequest
{
    public function authorize(): bool
    {
        return Auth::check();
    }

    public function rules(): array
    {
        return [
            'medico_id'   => 'required|exists:medicos,id',
            'paciente_id' => 'required|exists:pacientes,id',
            'data'        => 'required|date_format:Y-m-d H:i:s|after:now',
        ];
    }

    public function messages(): array
    {
        return [
            'medico_id.required'   => 'O ID do médico é obrigatório.',
            'medico_id.exists'     => 'O médico informado não existe.',
            'paciente_id.required' => 'O ID do paciente é obrigatório.',
            'paciente_id.exists'   => 'O paciente informado não existe.',
            'data.required'        => 'A data da consulta é obrigatória.',
            'data.date_format'     => 'A data deve estar no formato correto (Y-m-d H:i:s).',
            'data.after'           => 'A data da consulta deve ser no futuro.',
        ];
    }
}
