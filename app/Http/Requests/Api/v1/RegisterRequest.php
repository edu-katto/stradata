<?php

namespace App\Http\Requests\Api\v1;

use Illuminate\Foundation\Http\FormRequest;

class RegisterRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules() : array
    {
        return [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6',
        ];
    }

    public function messages() : array
    {
        return [
            'name.required' => 'name obligatorio',
            'email.required' => 'email obligatorio',
            'email.unique' => 'ya existe un usuario con este correo',
            'password.required' => 'password obligatorio',
            'password.min' => 'password debe tener como minimo 6 caracteres',
        ];
    }
}
