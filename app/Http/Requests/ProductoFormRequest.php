<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductoFormRequest extends FormRequest
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
            'nombre' => [
                'required',
                'string'
            ],
            'descripcion' => [
                'required',
                'string'
            ],
            /*'costo' => [
                'required',
            ],*/
            'precio' => [
                'required',
            ],
            'idcategoria' => [
                'required',
            ],
            'idmarca' => [
                'required',
            ],
            'imagen' => [
                'nullable',
                'mimes:jpg,jpeg,png',
            ],
        ];
    }
}
