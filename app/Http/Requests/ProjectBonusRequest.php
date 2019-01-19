<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProjectBonusRequest extends FormRequest
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
            'bonus' => 'required|numeric',
            'description' => 'required'
        ];
    }

    public function messages()
    {
        return [
            'bonus.required' => 'Nominal bonus harus diisi.',
            'bonus.numeric' => 'Format salah.',
            'description.required' => 'Keterangan harus diisi.'
        ];
    }
}
