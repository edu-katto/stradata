<?php

namespace App\Http\Requests\Api\v1;

use Illuminate\Foundation\Http\FormRequest;

class SearchLogRequest extends FormRequest
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
    public function rules()
    {
        return [
            'uuid' => 'required|min:10|max:36'
        ];
    }

    public function messages()
    {
        return [
            'uuid.required' => 'uuid es obligatorio',
            'uuid.min' => 'uuid incorrecto longitud minima de 10',
            'uuid.max' => 'uuid incorrecto longitud maxima de 36'
        ];
    }
}
