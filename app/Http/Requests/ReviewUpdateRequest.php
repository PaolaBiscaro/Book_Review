<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ReviewUpdateRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'nota'=>'sometimes|integer|min:1|max:5',
            'texto'=>'sometimes|nullable|string|max:1000',
            'livro_id'=>'sometimes|exists:livros,id',
            'usuario_id'=>'sometimes|exists:usuarios,id'
        ];
    }
}
