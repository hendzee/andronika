<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ClientRequest extends FormRequest
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
            'address' => 'required',
            'email' => 'required|email',
            'telp' => 'required|numeric',
            'description' => 'required'
        ];
    }

    public function messages()
    {
        return [
            'address.required' => 'Alamat harus diisi.',
            'email.required' => 'Email harus diisi.',
            'email.email' => 'Format email salah.',
            'telp.required' => 'Telpon harus diisi',
            'telp.numeric' => 'Format telpon salah.',
            'description.required' => 'Klien harus diisi.'
        ];
    }
}
