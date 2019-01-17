<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProjectPurchaseRequest extends FormRequest
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
            'total_item' => 'required|numeric',
            'price_per_item' => 'required|numeric',
            'resp_person' => 'required'
        ];
    }

    public function messages()
    {
        return[
            'date.required' => 'Tanggal harus diisi.',        
            'total_item.required' => 'Total barang harus diisi.',
            'total_item.numeric' => 'Format total barang salah.',
            'price_per_item.required' => 'Harga barang harus diisi.',
            'resp_person.required' => 'Keterangan pembeli harus diisi.'
        ];        
    }
}
