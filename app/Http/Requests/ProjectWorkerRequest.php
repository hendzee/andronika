<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProjectWorkerRequest extends FormRequest
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
            'name' => 'required',
            'address' => 'required',
            'telp' => 'required|numeric',            
            'division' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Nama harus diisi.',
            'address.required' => 'Alamat harus diisi.',
            'telp.required' => 'Telpon harus diisi.',
            'telp.numeric' => 'Format telpon salah.',
            'division.required' => 'Keterangan kerja harus diisi.',
        ];
    }
}
