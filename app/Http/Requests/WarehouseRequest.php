<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class WarehouseRequest extends FormRequest
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
            'item_name' => 'required',
            'number' => 'required|numeric'
        ];
    }

    public function messages()
    {
        return [
            'item_name.required' => 'Nama harus diisi.',
            'number.required' => 'Jumlah harus diisi.',
            'number.numeric' => 'Format salah.'
        ];
    }
}
