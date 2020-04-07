<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class ProductStoreRequest extends FormRequest
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
            'name' => 'required|min:3|max:255',
            'price' => 'nullable|numeric',
            'sale_price' => 'nullable|numeric',
            'category' => 'required|exists:categories,id',
            'image1' => 'required|image|max:1024'
        ];
    }

    public function messages()
    {
        return [
            'image.image' => 'Hmm, not a valid image.',
            'image1.required' => 'Please select an image.'
        ];
    }
}
