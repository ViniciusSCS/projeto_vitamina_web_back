<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' => 'required|string|max:50',
            'description' => 'required|string|max:255',
            'price' => 'required'
        ];
    }

    public function messages()
    {
        return [
            "required" => 'O campo :attribute é obrigatório.',
            "string" => 'O campo :attribute deve ser uma string.',
            "max" => 'O campo :attribute deve conter no máximo :max caracteres',
        ];
    }
}
