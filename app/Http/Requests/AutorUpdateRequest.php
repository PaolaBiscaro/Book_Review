<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AutorUpdateRequest extends FormRequest
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
            'nome'=> 'sometimes|string|max:100',
            'dt_nasc'=> 'sometimes|date',
            'biografia'=> 'sometimes|string|max:1000'
        ];
    }
}
