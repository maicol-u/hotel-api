<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SaveRoomRequest extends FormRequest
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
            'quantity' => 'numeric|required',
            'hotel_id' => 'numeric|required',
            'type_id' => 'numeric|required',
            'accommodation_id' => 'numeric|required',
        ];
    }
}
