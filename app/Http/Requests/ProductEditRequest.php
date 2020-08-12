<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductEditRequest extends FormRequest
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
            'image1' => 'nullable|image',
            'image2' => 'nullable|image',
            'image3' => 'nullable|image',
            'image4' => 'nullable|image',
        ];
    }

    public function messages()
    {
        return [
            'image.image' => 'Hmm, not a valid image.',
            'image.max' => 'Image size too large, max size 5MB',
            'image1.required' => 'Please select an image.'
        ];
    }
}
