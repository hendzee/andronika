<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RepairAndUsedRequest extends FormRequest
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
            'number_repair' => 'required|numeric',
            'number_used' => 'required|numeric'
        ];
    }

    public function messages()
    {
        return [
            'number_repair.required' => 'Jumlah data barang dengan status perbaikan harus diisi.',
            'number_repair.numeric' => 'Format salah.',
            'number_used.required' => 'Jumlah data barang dengan status terpakai harus diisi.',
            'number_used.numeric' => 'Format salah.',
        ];
    }
}
