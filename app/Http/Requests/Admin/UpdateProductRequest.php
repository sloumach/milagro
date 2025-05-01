<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class UpdateProductRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'name_ar' => 'required|string|max:255',
            'name_en' => 'required|string|max:255',
            'slug' => 'required|string|unique:products,slug,' . $this->route('id'),
            'description_ar' => 'nullable|string',
            'description_en' => 'nullable|string',
            'price' => 'required|numeric|min:0',
            'old_price' => 'nullable|numeric|min:0',
            'quantity' => 'required|integer|min:0',
            'rating' => 'nullable|numeric|min:0|max:5',
            'status' => 'required|in:active,inactive',
            'category_id' => 'required|exists:categories,id',
            'tags' => 'array|nullable',
            'tags.*' => 'integer|exists:tags,id',
            'images' => 'array|nullable',
            'images.*' => 'image|mimes:jpg,jpeg,png,webp|max:2048',

        ];
    }
}
