<?php

namespace App\Http\Requests\Agent;

use App\Rules\CheckAgentExceedLimit;
use Illuminate\Foundation\Http\FormRequest;

class StoreAgentRequest extends FormRequest
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
            'gender' => 'required',
            'phone' => 'required',
            'password' => 'required|min:6|max:12|confirmed',
            'email' => 'required|unique:users,email',
            'placement' =>  [
                'exists:agents,uuid',
                'nullable',
                new CheckAgentExceedLimit()
            ],
            'sponsor' =>  [
                'required', 
                'exists:agents,uuid'
            ]
        ];
    }
}
