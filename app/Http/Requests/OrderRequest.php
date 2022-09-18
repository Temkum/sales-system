<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class OrderRequest extends FormRequest
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
            'name' => 'required|max:255',
            'phone' => 'required|max:20',
            'address' => 'required|max:255',
            'price' => 'required|numeric|min:1000',
            'quantity' => 'required|numeric|min:1',
            'advance' => 'required|numeric|min:1000',
            'due_date' => 'required',
            'balance' => 'required',
            'description' => 'required|min:30',
        ];
    }
}