<?php

namespace App\Http\Requests\Api;

use Illuminate\Foundation\Http\FormRequest;

class StoreTicketRequest extends FormRequest
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
            'subject' => 'required|min:3|max:255',
            'type' => 'required|exists:ticket_types,id',
            'priority' => 'required|exists:priorities,id',
            'describe' => 'required|min:3|max:500',
        ];
    }
}
