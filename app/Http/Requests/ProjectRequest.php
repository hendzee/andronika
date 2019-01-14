<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProjectRequest extends FormRequest
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
            'start' => 'required',
            'end' => 'required',
            'total' => 'required|numeric',            
        ];
    }

    public function messages()
    {
        return([
            'name.required' => 'Nama harus diisi.',
            'start.required' => 'Tanggal mulai harus diisi.',
            'end.required' => 'Tanggal berakhir harus diisi.',
            'total.required' => 'Total harus diisi.',
            'total.numeric' => 'Format salah'
        ]);
    }
}
