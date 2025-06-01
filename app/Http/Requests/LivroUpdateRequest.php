<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class LivroUpdateRequest extends FormRequest
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
            'titulo'=>'sometimes|string|max:255',
            'sinopse'=>'sometimes|string|max:1000',
            'autor_id'=>'sometimes|integer|exists:autores,id',
            'genero_id'=>'sometimes|integer|exists:generos,id'
        ];
    }
}
