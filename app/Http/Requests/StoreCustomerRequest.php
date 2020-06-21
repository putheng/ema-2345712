<?php

namespace App\Http\Requests;

use App\Models\Customer;
use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class StoreCustomerRequest extends FormRequest
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
            'first_name' => 'required|min:3|max:255',
            'last_name' => 'required|min:3|max:255',
            'gender' => 'required',
            'address' => 'nullable|min:3|max:500',
            'phone' => [
                'required',
                'digits_between:9,10',
                'numeric',
                Rule::unique(Customer::class)->ignore(auth()->id(), 'user_id')
            ],
        ];
    }
}
