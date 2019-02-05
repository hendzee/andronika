<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CompanyCashRequest extends FormRequest
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
            'desc' => 'required',
            'date' => 'required',
            'price' => 'required|numeric',
            'number' => 'required|numeric',
        ];
    }

    public function messages()
    {
        return [
            'required' => 'Data harus diisi.',
            'numeric' => 'Format data salah.'
        ];
    }
}
