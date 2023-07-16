<?php

namespace App\Http\Requests\Dashboard\Products;

use Illuminate\Foundation\Http\FormRequest;

class UpdateProductRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'id'  => 'numeric',
            'name' => 'string|max:255',
            'description' => 'string',
            'image' => 'nullable|image|mimes:png,jpg,jpeg,gif,svg|max:2048',
            'category_id' => 'numeric|exists:categories,id',
            'price' => 'nullable|numeric',
            'discount_price' => 'nullable|numeric',
        ];
    }
}
