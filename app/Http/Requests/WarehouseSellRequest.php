<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class WarehouseSellRequest extends FormRequest
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
            'number' => 'required|numeric',
            'price_per_item' => 'required|numeric',
            'date' => 'required',
            'resp_person' => 'required'
        ];
    }

    public function messages()
    {
        return [
            'number.required' => 'Jumlah harus diisi.',
            'number.numeric' => 'Format salah.',
            'price_per_item.required' => 'Harga harus diisi.',
            'price_per_item.numeric' => 'Format salah.',
            'date.required' => 'Tanggal harus diisi.',
            'resp_person.required' => 'Penanggung jawab harus diisi.'
        ];
    }
}
