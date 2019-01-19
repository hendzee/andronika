<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class WorkerSalaryRequest extends FormRequest
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
            'salary' => 'required|numeric',
            'fullday' => 'required|numeric',
            'halfday' => 'required|numeric'
        ];
    }

    public function messages()
    {
        return [
            'salary.required' => 'Data gaji harus diisi.',
            'salary.numeric' => 'Format salah.',
            'fullday.required' => 'Data absensi harus diisi.',
            'fullday.numeric' => 'Format salah.',
            'halfday.required' => 'Data absensi harus diisi.',
            'halfday.numeric' => 'Format salah.',
        ];
    }
}
