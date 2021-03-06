<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PCTRequest extends FormRequest
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
            'nominal' => 'required|numeric',
            'date' => 'required'
        ];
    }

    public function messages()
    {
        return [
            'nominal.required' => 'Jumlah nominal harus diisi.',
            'nominal.numeric' => 'Format salah.',
            'date.required' => 'Tanggal harus diisi.'
        ];
    }
}
