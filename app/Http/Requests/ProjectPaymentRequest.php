<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProjectPaymentRequest extends FormRequest
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
            'date' => 'required',
            'transfer' => 'required|numeric'
        ];
    }

    public function messages()
    {
        return [
            'date.required' => 'Tanggal transfer harus diisi.',
            'transfer.required' => 'Nominal transfer harus diisi.',
            'transfer.numeric' => 'Nominal transfer diisi format angka'
        ];
    }
}
