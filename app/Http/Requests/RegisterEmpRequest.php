<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RegisterEmpRequest extends FormRequest
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
            'ci' => ['required', 'unique:personas,ci'],
            'correo' => ['required', 'unique:users,email'],
            'sexo' => ['required'],
            'celular' => ['required', 'unique:personas,celular'],
            'domicilio' => ['required'],
            'salario' => ['required'],
            'estadoemp' => ['required'],
            'tipoc' => ['required'],
            'tipoe' => ['required'],
            'iduser' => ['required'],
        ];
    }
}
