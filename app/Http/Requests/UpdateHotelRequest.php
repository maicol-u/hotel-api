<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateHotelRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'name' => 'required|string|unique:hotels|max:100',
            'city' => 'required|string|max:100',
            'address' => 'required|string|max:150',
            'phone' => 'max:20|string',
            'number_rooms' => 'numeric|required',
            'nit' => 'required|string|max:100'
        ];
    }
}
