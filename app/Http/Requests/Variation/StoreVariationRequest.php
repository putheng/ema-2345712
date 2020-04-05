<?php

namespace App\Http\Requests\Variation;

use Illuminate\Foundation\Http\FormRequest;

class StoreVariationRequest extends FormRequest
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
            'variations.*.name' => 'required',
            'variations.*.options.*.option' => 'required',
            'variations.*.options.*.price' => 'required|numeric',
            'variations.*.options.*.stock' => 'nullable|numeric',
            'variations.*.options.*.weight' => 'required|numeric',
            'variations.*.options.*.sale_price' => 'required|numeric',
        ];
    }

    public function messages()
    {
        return [
            'variations.*.required' => 'This field is required.',
            'variations.*.options.*.option' => 'This field is required.',
            'variations.*.options.*.numeric' => 'This field must be a number.',
        ];
    }
}
