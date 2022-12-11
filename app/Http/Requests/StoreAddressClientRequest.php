<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreAddressClientRequest extends FormRequest
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
            'address_1' => 'required',
            'address_2' => 'required',
            'city' => 'required',
            'department' => 'required',
            'country' => 'required',
            'postal_code' => 'required',
            'id_client' => 'required',
        ];
    }
}
