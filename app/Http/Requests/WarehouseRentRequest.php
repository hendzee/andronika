<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class WarehouseRentRequest extends FormRequest
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
            'number_item' => 'required|numeric',
            'price_day' => 'required|numeric',
            'start' => 'required',
            'end' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'number_item.required' => 'Jumlah harus diisi.', 
            'number_item.numeric' => 'Format salah.',
            'price_day.required' => 'Biaya harus diisi.',
            'price_day.numeric' => 'Format salah.',
            'start.required' => 'Tanggal sewa harus diisi.',
            'end.required' => 'Tanggal sewa harus diisi.',
        ];
    }
}
