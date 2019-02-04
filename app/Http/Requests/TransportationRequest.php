<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TransportationRequest extends FormRequest
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
            'starting_point' => 'required',
            'destination' => 'required',
            'distance' => 'required|numeric',
            'cost' => 'required|numeric',
            'total' => 'required|numeric',
            'description' => 'required',
            'date' => 'required',
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
