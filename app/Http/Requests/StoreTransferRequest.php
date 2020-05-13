<?php

namespace App\Http\Requests;

use App\Rules\UserBalance;
use Illuminate\Foundation\Http\FormRequest;

class StoreTransferRequest extends FormRequest
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
            'receiver' => 'required',
            'amount' => ['required', 'min:5', 'numeric', new UserBalance()],
        ];
    }

    public function messages()
    {
        return [
            'amount.min' => 'The :attribute must be at least :min '. auth()->user()->currency .'.',
        ];
    }
}
