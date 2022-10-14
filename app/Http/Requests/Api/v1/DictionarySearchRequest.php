<?php

namespace App\Http\Requests\Api\v1;

use Illuminate\Foundation\Http\FormRequest;

class DictionarySearchRequest extends FormRequest
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
            'name' => 'required|regex:/^[\pL\s\-]+$/u',
            'similary' => 'required|integer|between:1,100',
        ];
    }

    public function messages() : array
    {
        return [
            'name.regex' => 'Recuerde que solo se permiten letras y espacios en el nombre',
            'similary.between' => 'Solo se permite un rango de 1 a 99%',
        ];
    }

    public function attributes() : array
    {
        return [
            'name' => 'nombre a buscar',
            'similary' => 'porcentaje de parentesco'
        ];
    }
}
