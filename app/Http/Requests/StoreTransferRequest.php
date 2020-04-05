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
            'receiver' => 'required|exists:agents,uuid',
            'amount' => ['required', 'numeric', new UserBalance()],
        ];
    }
}
