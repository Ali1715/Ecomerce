<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateClienteRequest extends FormRequest
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
            'ci' => ['required'],
            'email' => ['required'],
            'sexo' => ['required'],
            'celular' => ['required'],
            'domicilio' => ['required'],
            'estadocli' => [''],
            'tipoc' => ['required'],
            'tipoe' => ['required'],
            'iduser' => [''],
        ];
    }
}
