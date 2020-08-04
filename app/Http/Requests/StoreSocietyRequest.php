<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreSocietyRequest extends FormRequest
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
            'first_name' => 'required|min:1|max:30',
            'last_name' => 'required|min:1|max:30',
            'gender' => 'required|max:20',
            'dob' => 'required',
            'id_type' => 'required|exists:i_d_types,id',
            'id_number' => 'required',
            'age' => 'required|numeric',
            // 'email' => ['required', 'string', 'email', 'max:255', 'unique:users,email,'. auth()->id()],
            'phone' => 'required|digits_between:9,10|numeric'
        ];
    }

    public function messages()
    {
        return [
            'dob.required' => 'Date of birth is required.'
        ];
    }
}
