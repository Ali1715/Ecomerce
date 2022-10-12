<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdatePerfilRequest extends FormRequest
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
            'name' => ['required'],
            'email' => ['required'],
            'ci' => ['required'],
            'sexo' => ['required'],
            'celular' => ['required'],
            'domicilio' => ['required'],
            'tipoc' => ['required'],
            'tipoe' => ['required'],
        ];
    }
}
