<?php

namespace App\Http\Requests\Admin;

use App\Rules\UserBalance;
use App\Rules\CurrentPassword;
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
            'uuid' => 'required|exists:stores,uuid',
            'amount' => ['required', 'min:5', 'numeric', new UserBalance()],
            'password' => ['required', new CurrentPassword()],
        ];
    }

    public function messages()
    {
        return [
            'amount.min' => 'The :attribute must be at least :min '. auth()->user()->currency .'.',
        ];
    }
}
