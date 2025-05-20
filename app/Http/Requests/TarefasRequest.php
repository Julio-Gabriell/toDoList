<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TarefasRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'titulo' => 'required|string|max:255',
            'descricao' => 'required|string|min:10',
            'prioridade' => 'required|in:baixa,media,alta',
            'data_entrega' => 'required|date|after_or_equal:today',
        ];
    }

    public function messages(): array{
        return [
            'titulo.required' => 'O título é obrigatório.',
            'descricao.required' => 'A descrição é obrigatória.',
            'descricao.min' => 'A descrição deve ter pelo menos 10 caracteres.',
            'prioridade.required' => 'A prioridade é obrigatória.',
            'prioridade.in' => 'A prioridade deve ser baixa, média ou alta.',
            'data.required' => 'A data de entrega é obrigatória.',
            'data.date' => 'A data de entrega deve ser uma data válida.',
            'data.after_or_equal' => 'A data de entrega não pode ser no passado.'
        ];
    }
}
